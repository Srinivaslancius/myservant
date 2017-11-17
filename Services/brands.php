<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Bitter" rel="stylesheet" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<style>
.carousel-showmanymoveone
{
  .carousel-control
  { 
    width: 4%;
    background-image:none;

    &.left 
    {
      margin-left:15px;
    }

    &.right 
    {
      margin-right:15px;
    }
  }

  .cloneditem-1, 
  .cloneditem-2, 
  .cloneditem-3
  {
    display: none;
  }

  .carousel-inner
  {
    @media all and (min-width: 768px)
    {
      @media (transform-3d), (-webkit-transform-3d)
      {
        > .item.active.right,
        > .item.next
        { 
          transform: translate3d(50%, 0, 0);  
          left: 0;
        }

        > .item.active.left,
        > .item.prev
        { 
          transform: translate3d(-50%, 0, 0);
          left: 0;
        }

        > .item.left,
        > .item.prev.right,
        > .item.active
        {
          transform: translate3d(0, 0, 0);
          left: 0;
        }    
      } 

      > .active.left,
      > .prev
      {
        left: -50%;
      }

      > .active.right,
      > .next
      {
        left:  50%;
      }

      > .left,
      > .prev.right,
      > .active
      {
        left: 0;
      }

      .cloneditem-1 
      {
        display: block;
      }
    }

    @media all and (min-width: 992px)
    {    
      @media (transform-3d), (-webkit-transform-3d)
      {
        > .item.active.right,
        > .item.next
        { 
          transform: translate3d(25%, 0, 0);  
          left: 0;
        }    

        > .item.active.left,
        > .item.prev
        { 
          transform: translate3d(-25%, 0, 0);
          left: 0;
        }

        > .item.left,
        > .item.prev.right,
        > .item.active
        {
          transform: translate3d(0, 0, 0);
          left: 0;
        }
      }

      > .active.left,
      > .prev
      {
        left: -25%;
      }

      > .active.right,
      > .next
      {
        left:  25%;
      }

      > .left,
      > .prev.right,
      > .active
      {
        left: 0;
      }

      .cloneditem-2, 
      .cloneditem-3
      {
        display: block;
      }
    }    
  }
}

.logo
{
  margin: 20px auto;
  height: 100px;  
}
  @media only screen and (min-width : 768px) {  
    margin: 28px;
    float: left;
  }
}
</style>
</head>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="carousel carousel-showmanymoveone slide" id="carousel123">
        <div class="carousel-inner">
          <div class="item active">
            <div class="col-xs-12 col-sm-2 col-md-2"><a href=""><img src="img/guide_1.jpg"></a></div>
          </div>
          <div class="item">
             <div class="col-xs-12 col-sm-2 col-md-2"><a href=""><img src="img/guide_1.jpg"></a></div>
          </div>
          <div class="item">
          <div class="col-xs-12 col-sm-2 col-md-2"><a href=""><img src="img/guide_1.jpg"></a></div>
          </div>          
          <div class="item">
          <div class="col-xs-12 col-sm-2 col-md-2"><a href=""><img src="img/guide_1.jpg"></a></div>
          </div>
          <div class="item">
         <div class="col-xs-12 col-sm-2 col-md-2"><a href=""><img src="img/guide_1.jpg"></a></div>
          </div>
          <div class="item">
        <div class="col-xs-12 col-sm-2 col-md-2"><a href=""><img src="img/guide_1.jpg"></a></div>
          </div>
         
        </div>
        <a class="left carousel-control" href="#carousel123" data-slide="prev"><i class="glyphicon glyphicon-chevron-left" style="margin-left:-90px;color:#f26226"></i></a>
        <a class="right carousel-control" href="#carousel123" data-slide="next"><i class="glyphicon glyphicon-chevron-right"style="margin-right:-90px;color:#f26226"></i></a>
      </div>
    </div>
  </div> 
</div>

<script>
(function(){
  // setup your carousels as you normally would using JS
  // or via data attributes according to the documentation
  // https://getbootstrap.com/javascript/#carousel
  $('#carousel123').carousel({ interval: 2000 });
  $('#carouselABC').carousel({ interval: 3600 });
}());

(function(){
  $('.carousel-showmanymoveone .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<6;i++) {
      itemToClone = itemToClone.next();

      // wrap around if at end of item collection
      if (!itemToClone.length) {
        itemToClone = $(this).siblings(':first');
      }

      // grab item, clone, add marker class, add to collection
      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
}());
</script>
