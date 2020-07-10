$(function(){
  var $good = $('.btn-good'),
              goodPostId;
  $good.on('click',function(e){
    e.stopPropagation();
    var $this = $(this);
    goodPostID = $this.parents('.post').data('postid');
    $.ajax({
      type: 'POST',
      url: '../ajaxGood.php',
      data: {postId: goodPostID}
    }).done(function(data){
      console.log('Ajax Success');

      $this.children('span').html(data);
      $this.children('i').toggleClass('far');
      $this.children('i').toggleClass('fas');
      $this.children('i').toggleClass('active');
      $this.toggleClass('active');
    }).fail(function(msg) {
      console.log('Ajax Error');
    });
  });
});