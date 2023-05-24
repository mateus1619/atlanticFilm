
const Server_Stream  = [ 'http://localhost:80']
const SelectorCarousel  = [ '.carousel-main', '.siema-items-releases', '.siema-items-in_high']

SiemaReleases = new Siema({
    selector: SelectorCarousel[1],
    duration: 200,
    easing: 'ease-out',
    startIndex: 0,
    draggable: true,
    multipleDrag: true,
    loop: false,
    rtl: false,
    perPage: {
        1180: 6,
        980:  5,
        760:  4,
        640:  3,
        560:  3,
        460:  2,
    }
})
Siemain_high = new Siema({
    selector: SelectorCarousel[2],
    duration: 200,
    easing: 'ease-out',
    startIndex: 0,
    draggable: true,
    multipleDrag: true,
    loop: false,
    rtl: false,
    perPage: {
        1180: 6,
        980:  5,
        760:  4,
        640:  3,
        560:  3,
        460:  2,
    }
})
$.ajax({
    url: Server_Stream[0],
    type: "GET",
    success: function (response) {
        // Main carousel
        // $('.content').css({"display": "block"})
        response.highlighted.list.forEach((element, index) => {
            $('.carousel-indicators').append(Carouselmain('#', element.capa, element.nome, element.ID, index)[0])
            $('.carousel-inner').append(Carouselmain('#', element.capa, element.nome, element.ID, index)[1]);
        })

        // Posters releases
        response.releases.list.forEach((element) => {
            SiemaReleases.append(Posters('#', element.poster, element.nome, element.ano, element.nota, element.audio))
        });

        // Posters in_high
        response.top_10.list.forEach((element) => {
            Siemain_high.append(Posters('#', element.poster, element.nome, element.ano, element.nota, element.audio))
        })

    }, error: function () {
        $(".container-fluid").append('<div class="home-error"> <span class="content-home-error"> Algo errado aconteceu... <br>Recarregue a página</span> </div>');
    }


})






























function Carouselmain(redirect, image, name, content_id, slide_index) {
    let active
    !slide_index ? active="active" : active=null
    return [
        `<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="${slide_index}" class="${active} rounded rounded-4 carousel-button" aria-current="true"></button>`, 
        `<div class="carousel-item ${active}" data-bs-interval="4000">
        <a class="" href="${redirect}">
        <img src="https:${image}" class="d-block w-100 carousel-image" id=${content_id} decoding="async">
        <div class="carousel-caption vstack">
            <span class="carousel-destacados">ᴘᴏᴘᴜʟᴀʀ ʜᴏᴊᴇ</span>
            <span class="carousel-film-name fw-semibold">${name}</span>
        </div>
        </a>
        </div> `
    ]
}
function Posters(redirect, image, name, year, rating, audio) {
    return `
    <div class="card item-poster">
        <a href="${redirect}" class="redirect-poster">
        <img class="card-img-top img-poster" src="${image}" loading="lazy" width="185" height="270">
        <div class="info-poster">
            <span class="name-poster">${name}</span>
            <div class="info-details-poster d-flex justify-content-between">
            <div class="year-poster">${year}</div>
            <div class="rating-poster">${rating}</div>
            <div class="audio-poster">${audio}</div>
            </div>
        </div>
        </a>
    </div> `
}