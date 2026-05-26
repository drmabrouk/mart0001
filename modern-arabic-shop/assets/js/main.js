/* Main JS */
jQuery(document).ready(function($) {
    // Predictive Search
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
                            html += '<div class="mas-search-item"><a href="' + item.url + '">' + item.title + ' (' + item.price + ' SAR)</a></div>';
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

    // Toggle Filter Options
    $('#masFilterBtn').on('click', function() {
        $('#masFilterOptions').slideToggle();
    });

    // Filtering Logic
    $('#masMinPrice, #masMaxPrice').on('change', function() {
        var min = $('#masMinPrice').val();
        var max = $('#masMaxPrice').val();

        $.ajax({
            url: mas_ajax_obj.ajaxurl,
            type: 'POST',
            data: {
                action: 'mas_filter_products',
                min_price: min,
                max_price: max,
                nonce: mas_ajax_obj.nonce
            },
            success: function(response) {
                if (response.success) {
                    $('.mas-product-grid').html(response.data);
                }
            }
        });
    });

    // Close search results when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.mas-search-container').length) {
            $('#masSearchResults').hide();
        }
    });
});
