/* global $*/
$(document).ready(function(){
    var iName = imgName;
    var carouselItems = [{
            
        id:"item1",
        imgSrc:"../images/"+iName+"_1.jpg ",
        title:"First step!"
    },
    {
        id:"item2",
        imgSrc:"../images/"+iName+"_2.jpg",
        title:"Second step!"
    },
    {
        id:"item3",
        imgSrc:"../images/"+iName+"_3.jpg",
        title:"Third step!"
    },
    {
        id:"item4",
        imgSrc:"../images/"+iName+"_4.jpg",
        title:"Fourth step!"
    }];
    
    for (var i=0;i<carouselItems.length;i++) {
        var carouselItemsContainer = $(".carousel-inner");
        var currentCarouselItem = '<div id='+carouselItems[i].id+' class="carousel-item">\
                <img src='+carouselItems[i].imgSrc+' class="img-responsive">\
                <div class="carousel-item-caption">'+carouselItems[i].title+'</div>\
            </div>';
        if (i === 0) {
            currentCarouselItem = $(currentCarouselItem).addClass("active");
        }
        carouselItemsContainer.append(currentCarouselItem);
        
        
        //build carousel indicators
        var carouselIndicatorsContainer = $(".carousel-indicators");
        var carouselIndicator = "<li data-value="+i+"></li>"
        
        if (i === 0) {
            carouselIndicator = $(carouselIndicator).addClass("active");
        }
        carouselIndicatorsContainer.append(carouselIndicator);
    }
    
    var currentActiveItem  = 0;//first itemm in carousel is active by default
    
    var intervalId = setInterval(function(){
        var nextIndex = getTheNextIndex();
        goToIndex(nextIndex);
    },3000);
    function goToIndex(index){
        console.log("going to index: "+index);
        var item = carouselItems[index];
        var id = item.id;
        $(".carousel-item").removeClass("active");
        $("#"+id).addClass("active");
        
        //update carousel indicators also
        $(".carousel-indicators li").removeClass("active");
        var indicatorHTML = $(".carousel-indicators li")[index];
        $(indicatorHTML).addClass("active");
    }
    function getTheNextIndex(){
        var nextIndex = currentActiveItem + 1;
        
        if (nextIndex >= carouselItems.length){
            currentActiveItem = 0;
        } else {
            currentActiveItem = nextIndex;
        }
        return currentActiveItem;
    }
    
    function getPrevIndex(){
        var prevIndex = currentActiveItem - 1;
        if (prevIndex < 0) {
            currentActiveItem = carouselItems.length-1;
        } else {
            currentActiveItem = prevIndex;
        }
        return currentActiveItem;
    }
    
    $(".next-btn").click(function(){
            clearInterval(intervalId);
            var index = getTheNextIndex();
            goToIndex(index);
        });
        
        $(".prev-btn").click(function(){
            clearInterval(intervalId);
            var index = getPrevIndex();
            goToIndex(index);
        });
        
        $(".carousel-indicators li").click(function(){
            var index = $(this).attr("data-value");//$(this).data("value");
            currentActiveItem = Number(index);
            goToIndex(index);
            clearInterval(intervalId);
        });
});