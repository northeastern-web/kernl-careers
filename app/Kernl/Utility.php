<?php

namespace Kernl;

class Utility
{
    public function __construct()
    {}

    /**
     * Retrieve Northeastern tag manager roll-up snippet
     * @param  string $environment
     * @return void
     */
    public static function getTagManager($environment = 'development')
    {
        if ($environment === 'production') {
            return '
                <!-- Google Tag Manager - Roll-Up Property -->
                <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-WGQLLJ"
                height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
                <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({"gtm.start":
                new Date().getTime(),event:"gtm.js"});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!="dataLayer"?"&l="+l:"";j.async=true;j.src=
                "//www.googletagmanager.com/gtm.js?id="+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,"script","dataLayer","GTM-WGQLLJ");</script>
                <!-- End Google Tag Manager -->
            ';
        }
    }


    /**
     * Get Google Analytics
     * @param  string $environment
     * @param  string $tracker
     * @return void
     */
    public static function getGoogleAnalytics($environment = 'development', $tracker)
    {
        if ($environment === 'production') {
            return "
                <script>
                  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
                  ga('create', '{$tracker}', 'auto');
                  ga('send', 'pageview');
                </script>
            ";
        } else {
            return "<!-- $environment ENV: GA {$tracker} -->";
        }
    }
}
