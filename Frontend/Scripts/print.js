(function ($) {

    $.fn.printme = function () {
        return this.each(function () {
            const container = $(this);

            const hidden_IFrame = $('<iframe></iframe>').attr({
                width: '1px',
                height: '1px',
                display: 'none'
            }).appendTo(container);

            const myIframe = hidden_IFrame.get(0);

            const script_tag = myIframe.contentWindow.document.createElement("script");
            script_tag.type = "text/javascript";
            let script = myIframe.contentWindow.document.createTextNode('function Print(){ window.print(); }');
            script_tag.appendChild(script);

            myIframe.contentWindow.document.body.innerHTML = container.html();
            myIframe.contentWindow.document.body.appendChild(script_tag);

            myIframe.contentWindow.print();
            hidden_IFrame.remove();

        });
    };
})(jQuery);