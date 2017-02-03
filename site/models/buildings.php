<?php
defined('_JEXEC') or die;


class parkwayModelBuildings extends JModelList
{


    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id', 'b.id',
                'property_id', 'b.property_id',
                'space', 'b.typical_floor_size',


            );

            $assoc = JLanguageAssociations::isEnabled();

            if ($assoc) {
                $config['filter_fields'][] = 'association';
            }
        }


        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @param   string $ordering An optional ordering field.
     * @param   string $direction An optional direction (asc|desc).
     *
     * @return  void
     *
     * @since   1.6
     */
    protected function populateState($ordering = 'b.id', $direction = 'asc')
    {
        $app = JFactory::getApplication();

        // Adjust the context to support modal layouts.
        if ($layout = $app->input->get('layout')) {
            $this->context .= '.' . $layout;
        }

        $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);


        $property = $this->getUserStateFromRequest($this->context . '.filter.property', 'filter_property');
        $this->setState('filter.property', $property);

        $space = $this->getUserStateFromRequest($this->context . '.filter.space', 'filter_space');
        $this->setState('filter.space', $space);


        // List state information.
        parent::populateState($ordering, $direction);
    }


    protected function getStoreId($id = '')
    {
        // Compile the store id.
        $id .= ':' . $this->getState('filter.search');
        $id .= ':' . $this->getState('filter.property');


        return parent::getStoreId($id);
    }
public function getAllVacancies(){
    $query=$this->getListQuery();
    $db = JFactory::getDbo();
    $db->setQuery($query);
    $result = $db->loadObjectList();
    return $result;
}
    protected function getListQueryTest()
    {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        //Filter by properties
       // $property = intval($this->getState('filter.property'));
        $jinput = JFactory::getApplication()->input;
        $property = $jinput->get('filter_property', '0', 'INT');
        if (!empty($property)) {

        }



        $sql = "SELECT * FROM dq9bd_parkway_vacancies AS v
        LEFT JOIN dq9bd_parkway_floorplans AS f ON f.id=v.floorplan_id
        LEFT JOIN dq9bd_parkway_buildings AS b ON b.id=f.building_id
        LEFT JOIN dq9bd_parkway_properties AS p ON p.id=b.property_id
        WHERE  p.id=$property
        
";

        $db->SetQuery($sql);

        return $sql;
        $menuItem = $db->loadObject();
    }
    protected function getListQuery()
    {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $user = JFactory::getUser();

        // Select the required fields from the table.
        $query->select($db->quoteName('b.name', 'building_name'));
        $query->select('COUNT(b.name) AS counted_vacancies');
        $query->select(
            $db->quoteName(
                explode(', ', $this->getState(
                    'list.select', 'b.id, b.name, b.address1, b.address2, b.city, b.state, b.zip, b.year_built, b.typical_floor_size, b.image, b.imagethumb, b.number_of_floors, p.name, b.leed_cert, b.parking_ratio, b.building_size, b.fact_sheet, b.show_fact_sheet'
                )
                )
            )
        );

        $query->from($db->quoteName('#__parkway_vacancies', 'v'));
        // Join over the floorplan.

        $query->select($db->quoteName('f.floor_level'))
            ->join(
                'LEFT',
                $db->quoteName('#__parkway_floorplans', 'f') . ' ON ' . $db->quoteName('f.id') . ' = ' . $db->quoteName('v.floorplan_id')
            );

        // Join over the building name and property id from the buildings table.

        $query->select($db->quoteName('b.property_id', 'property_id'))
            ->select($db->quoteName('b.name', 'building_name'))
            ->join(
                'LEFT',
                $db->quoteName('#__parkway_buildings', 'b') . ' ON ' . $db->quoteName('b.id') . ' = ' . $db->quoteName('f.building_id')
            );

        // Join over the property name.

        $query->select($db->quoteName('p.name', 'property_name'), $db->quoteName('p.id', 'id'))
            ->join(
                'LEFT',
                $db->quoteName('#__parkway_properties', 'p') . ' ON ' . $db->quoteName('p.id') . ' = ' . $db->quoteName('b.property_id')
            );


        //Filter by properties
        $property = $this->getState('filter.property');

        if (!empty($property)) {
            $query->where(
                '(' . $db->quoteName('b.property_id') . ' = ' . intval($property) . ')'
            );
        }

        //Filter by available space.
        $space = $this->getState('filter.space');


        if (!empty($space['min']) && !empty($space['max'])) {
            $query->where(
                '(' . $db->quoteName('v.available_space') . ' BETWEEN ' . intval($space['min']) . ' AND ' . intval($space['max']) . ')'
            );

        } else if (empty($space['min']) && !empty($space['max'])) {
            $query->where(
                '(' . $db->quoteName('v.available_space') . ' BETWEEN 0 AND ' . intval($space['max']) . ')'
            );

        } else if (!empty($space['min']) && empty($space['max'])) {
            $query->where(
                '(' . $db->quoteName('v.available_space') . ' BETWEEN ' . intval($space['min']) . ' AND 999999999 )'
            );

        }


        // Filter by search in name.
        $search = $this->getState('filter.search');

        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where('v.id = ' . (int)substr($search, 3));
            } elseif (stripos($search, 'author:') === 0) {
                $search = $db->quote('%' . $db->escape(substr($search, 7), true) . '%');
                $query->where(
                    '(' . $db->quoteName('uc.name') . ' LIKE ' . $search . ' OR ' . $db->quoteName('uc.username') . ' LIKE ' . $search . ')'
                );
            } else {
                $search = $db->quote('%' . str_replace(' ', '%', $db->escape(trim($search), true) . '%'));
                $query->where(
                    '(' . $db->quoteName('b.name') . ' LIKE ' . $search . ' OR ' . $db->quoteName('b.address1') . ' LIKE ' . $search . ')'
                );
            }
        }


        $query->where('v.published = "1" ');

        $query->group('b.name');

        // Add the list ordering clause.
        $orderCol = $this->state->get('list.ordering', 'p.name');
        $orderDirn = $this->state->get('list.direction', 'asc');

        if ($orderCol == 'a.ordering' || $orderCol == 'category_title') {
            $orderCol = $db->quoteName('c.title') . ' ' . $orderDirn . ', ' . $db->quoteName('a.ordering');
        }

        $query->order($db->escape($orderCol . ' ' . $orderDirn));
        // Prepare the query

        return $query;
    }


}

