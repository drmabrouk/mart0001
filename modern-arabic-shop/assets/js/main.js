/* Standalone SPA-like JS Logic */
jQuery(document).ready(function($) {
    // AJAX Page Navigation
    function loadPage(slug) {
        $('.mas-main-content').css('opacity', 0.5);
        $.ajax({
            url: mas_ajax_obj.ajaxurl,
            type: 'POST',
            data: {
                action: 'mas_get_page_content',
                slug: slug,
                nonce: mas_ajax_obj.nonce
            },
            success: function(response) {
                if (response.success) {
                    $('.mas-main-content').html('<div class="mas-container">' + response.data.content + '</div>');
                    document.title = response.data.title;
                    window.history.pushState({slug: slug}, response.data.title, '/' + slug);
                }
                $('.mas-main-content').css('opacity', 1);
            }
        });
    }

    // Handle internal links
    $(document).on('click', 'a[href^="' + window.location.origin + '"]', function(e) {
        var url = new URL($(this).attr('href'));
        var slug = url.pathname.substring(1);
        var allowedSlugs = ['home', 'search', 'cart', 'orders', 'profile', 'settings', 'management'];

        if (allowedSlugs.includes(slug)) {
            e.preventDefault();
            loadPage(slug);
        }
    });

    // Predictive Search with dropdown suggestions
    $('#masSearch').on('keyup', function() {
        var term = $(this).val();
        if (term.length > 2) {
            $.ajax({
                url: mas_ajax_obj.ajaxurl,
                type: 'POST',
                data: {
                    action: 'mas_predictive_search',
                    term: term,
                    nonce: mas_ajax_obj.nonce
                },
                success: function(response) {
                    var html = '';
                    if (response.length > 0) {
                        response.forEach(function(item) {
                            html += '<div class="mas-search-item"><a href="' + item.url + '">' + item.title + ' (' + item.price + ' ج.م)</a></div>';
                        });
                    } else {
                        html = '<div>No results found</div>';
                    }
                    $('#masSearchResults').html(html).show();
                }
            });
        } else {
            $('#masSearchResults').hide();
        }
    });

    // Cancel Order AJAX
    $(document).on('click', '.mas-cancel-order', function() {
        var btn = $(this);
        var orderId = btn.data('id');
        if (confirm('هل أنت متأكد من إلغاء الطلب؟')) {
            $.ajax({
                url: mas_ajax_obj.ajaxurl,
                type: 'POST',
                data: {
                    action: 'mas_cancel_order',
                    order_id: orderId,
                    nonce: mas_ajax_obj.nonce
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.data);
                        loadPage('orders');
                    }
                }
            });
        }
    });

    // Handle back button
    window.onpopstate = function(event) {
        if (event.state && event.state.slug) {
            loadPage(event.state.slug);
        }
    };
});
