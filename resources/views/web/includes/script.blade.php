@livewireScripts
<!-- jQuery -->
<script src="{{ $web_source }}/js/jquery.min.js"></script>
<script src="{{ $web_source }}/js/jquery.uniform.min.js"></script>
<script src="{{ $web_source }}/js/jquery.slicknav.min.js"></script>
<script src="{{ $web_source }}/js/wow.min.js"></script>
<script src="{{ $web_source }}/js/jquery-ui-sliderAccess.js"></script>
<script src="{{ $web_source }}/js/search.js"></script>
<script src="{{ $web_source }}/js/scripts.js"></script>
<!--custom js-->
<script src="{{asset('toast')}}/jquery.toast.min.js"></script>

<!-- toastr init js-->
{{-- <script src="{{url('admin')}}/assets/js/pages/toastr.init.js"></script> --}}
<script>
	! function(p) {
		"use strict";
		var notifier;

		function t() {}
		t.prototype.send = function(t, i, o, e, n, a, s, r) {
				var c = {
					heading: t,
					text: i,
					position: o,
					loaderBg: e,
					icon: n,
					hideAfter: a = a || 3e3,
					stack: s = s || 1
				};
				r && (c.showHideTransition = r),
					// console.log(c),
					p.toast().reset("all"),
					p.toast(c)
			},
			p.NotificationApp = new t,
			p.NotificationApp.Constructor = t
	}(window.jQuery),
	function(i) {
		notifier = i;
		"use strict";
	}(window.jQuery);

	function successMsg(title, msg) {
		notifier.NotificationApp.send(title, msg, "top-right", "#5ba035", "success")
	}

	function errorMsg(title, msg) {
		notifier.NotificationApp.send(title, msg, "top-right", "#bf441d", "error")
	}
</script>


 <script>
	 $(document).ready(function () {
		 $('.single').hide().first().show();
		 $('.categories li:first').addClass('active');

		 $('.categories a').on('click', function (e) {
			 e.preventDefault();
			 $(this).closest('li').addClass('active').siblings().removeClass('active');
			 $($(this).attr('href')).show().siblings('.single').hide();
		 });

		 var hash = $.trim( window.location.hash );
		 if (hash) $('.categories a[href$="'+hash+'"]').trigger('click');
	 });
 </script>

 
@yield('script')
