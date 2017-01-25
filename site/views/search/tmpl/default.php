<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
    
$(document).ready(function() {
// Function to change form action.
    $("#filter_property").change(function() {
            var selected = $(this).children(":selected").text();
            switch (selected) {
                case "CityWestPlace":
                    $("#dropdownSearch").attr('action', 'index.php?option=com_parkway&view=buildings&layout=byproperty&filter_property=1&Itemid=307');
                    
                    break;
                case "Greenway Plaza":
                    $("#dropdownSearch").attr('action', 'index.php?option=com_parkway&view=buildings&layout=byproperty&filter_property=1&Itemid=338');
                    
                    break;
                case "Post Oak Central":
                    $("#dropdownSearch").attr('action', 'index.php?option=com_parkway&view=buildings&layout=byproperty&filter_property=1&Itemid=346');
                    
                    break;
                case "San Felipe Plaza":
                    $("#dropdownSearch").attr('action', 'index.php?option=com_parkway&view=buildings&layout=byproperty&filter_property=1&Itemid=279');
                    
                    break;    
                default:
                    $("#dropdownSearch").attr('action', 'index.php?option=com_parkway&view=buildings&layout=byproperty&filter_property=1&Itemid=599');
            }
    });
        // Function For Back Button
    $(".back").click(function() {
        parent.history.back();
        return false;
    });
}); 
</script>
<div class="uk-panel find-space-mod">

    
    <h3 class="uk-panel-title">Find Your Space</h3>
    <form id="dropdownSearch" method="post" action="#">
        <select name="filter_property" id="filter_property">
            <option selected="" disabled="" value="">Property</option>
            <option value="1">CityWestPlace</option>
            <option value="2">Greenway Plaza</option>
            <option value="3">Post Oak Central</option>
            <option value="4">San Felipe Plaza</option>
        </select> 
        <select name="filter[space][max]">
            <option selected="" disabled="" value="">Max SqFt</option>
            <option value="5000">5,000</option>
            <option value="10000">10,000</option>
            <option value="25000">25,000</option>
            <option value="50000">50,000</option>
            <option value="100000">100,000</option>
        </select> 
        <button type="submit" class="uk-button" onclick="">Search Now</button>
        <input name="Itemid" value="0" type="hidden">    
    </form>
</div>

    

