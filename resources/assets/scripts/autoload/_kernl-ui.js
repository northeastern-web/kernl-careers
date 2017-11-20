import 'kernl-ui'

// add class to homepage search div for active
$('.\\--hero .__search .__control').on('click touch', function(){
  $(this).parent().addClass('--focus')
})
