const element = document.querySelector('.is-pagination-data');
const button = document.querySelector('.load-more');
let page = parseInt(element.getAttribute('data-page'));
let lastpage = parseInt(element.getAttribute('data-page-count'));
var scrollTrigger = $('body').find('.load-more');

var sortString = $('.is-pagination-data').attr('data-sort-string');
var sortStringDate = $('.is-pagination-data').attr('data-sort-by-date-string');
var sortStringName = $('.is-pagination-data').attr('data-sort-by-name-string');

// url definition based on params (used on directory and search)
var urlbaseInit = `${window.location.href.split('#')[0]}`;
var urlbaseParam = `${urlbaseInit.split('/'+sortString+':')[0]}`;
var urlbase = urlbaseParam.replace(/\/+$/, '');

// params definition on directory and search (sort = sort on directory and sort = type on search)
var urlParamInit = urlbaseInit.substring(
    urlbaseInit.indexOf('/'+sortString+':') + 0
);

// params value depending on if defined or not
if(urlParamInit != urlbase){
    var params = `${urlParamInit.split('?')[0]}`;
    var query = `?${urlParamInit.split(/[? ]+/).pop()}`;
} else{
    var params = '';
    var query = '';
}

// setup for the sorting
var url     = `${urlbase}.json${params}`;
var limit   = parseInt(element.getAttribute('data-limit'));
var offset  = limit;
// setup for sorting plus pagination
var name   = parseInt(element.getAttribute('data-name'));

// fallback for js for prev-next
document.documentElement.classList.replace('no-js', 'js');

// function to fetch projects
const fetchItems = async () => {

    console.log(page);
    console.log(lastpage);

    // define url with page no.
    let url = `${urlbase}.json${params}/page:${page}${query}`;

    try {

        if (page <= lastpage) {
            const response = await fetch(url);
            
            if (response.ok) {

                const {
                    html,
                    more
                } = await response.json();
                button.hidden = !more;
                
                element.insertAdjacentHTML('beforeend', html);
                page++;

                // send the value with the ajax request  
                $.get(url, {limit: limit, offset: offset, element: element}, function(data) {

                    if(data.more === false) {
                        $('.load-more').hide();
                    }
            
                    element.children().last().after(data.html);
            
                    offset += limit;
            
                });

            }
        }

        // remove the load more page trigger and text
        if (page > lastpage) {

            scrollTrigger.addClass('removeloading');

        }

    } catch (error) {

            console.log('Fetch error: ', error);

    }
}

// fallback button
document.addEventListener('click', fetchItems);


// use intesection observer to trigger loading more
const myObserver = new IntersectionObserver(elements => {

    console.log(elements[0].intersectionRatio);

    if (elements[0].intersectionRatio > 0) {

        fetchItems();

        setTimeout(function () {

            scrollTrigger.addClass('loading');

        }, 100);

    } else {
        scrollTrigger.removeClass('loading');
    }

}, {
  rootMargin: '100%',
});

const myEl = document.querySelector('.load-more');
myObserver.observe(myEl);



  
