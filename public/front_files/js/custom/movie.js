$(document).ready(function () {

    let fav_count = $('#nav__fav-count').data('fav_count');

    $(document).on('click','.movie__fav-icon',function (e) {
        e.preventDefault();
        let url = $(this).data('url');
        let isFavored = $(this).hasClass('fw-900');
        let movieId = $(this).data('movie_id');

        toggleFavorite(url,isFavored,movieId);

    }) //end of event click

    $(document).on('click','.movie__fav-btn',function (e) {
        e.preventDefault();
        let url = $(this).find('.movie__fav-icon').data('url');
        let isFavored = $(this).find('.movie__fav-icon').hasClass('fw-900');
        let movieId = $(this).find('.movie__fav-icon').data('movie_id');

        toggleFavorite(url,isFavored,movieId);

    }) //end of event click

     function toggleFavorite(url,isFavored,movieId) {

        !isFavored ? fav_count++ : fav_count--;

        fav_count > 9 ? $('#nav__fav-count').html('9+') : $('#nav__fav-count').html(fav_count)


        $('.movie-'+movieId).toggleClass('fw-900');

        axios({
            url:url,
            method:"POST",
        })
    }

}) //end of document ready
