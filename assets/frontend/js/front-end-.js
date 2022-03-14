! function (e) {


    console.log(quiktheme-copy.ajax_url)

    xdLocalStorage.init({
        iframeUrl: "https://leap13.github.io/pa-cdcp/",
        initCallback: function () { }
    });

    var copy_text = jQuery('.copy-section').parents('.elementor-section');



    jQuery('.copy-section').on("click", function (t) {
            t.preventDefault();

        var i = jQuery(this).parents('.elementor-section').data("id")

        e.get(quiktheme-copy.ajax_url, {
            action: "get_section_data",
            section_id: i,
            post_id: quiktheme-copy.post_id,
            nonce: quiktheme-copy.nonce
        }).done(function (e) {
            console.log(e);
            if (e.success) {
                // o.text("Copied!");

                xdLocalStorage.setItem("quiktheme-c-p-element", JSON.stringify(e.data));
                // var n = setTimeout(function () {
                //     // i.text("Live Copy"), o.hide(), clearTimeout(n)
                // }, 1e3)
            }
        })
    })
}(jQuery);