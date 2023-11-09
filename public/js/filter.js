const wrapper = document.querySelector('.filter');
const filterEls = wrapper.querySelectorAll('.filter-element');
const filterElsByChange = wrapper.querySelectorAll('.filter-element:not(.filter-by-btn)');
const postListComponent = document.querySelector('.list');

const filter = {
    page: 1
}

filterElsByChange.forEach(filterEl => filterEl.addEventListener('change', (e) => {
    filtering();
}));

const filtering = () => {
    filterEls.forEach(el => {
        filter[el.getAttribute('name')] = el.type === 'checkbox' ? el.checked : el.value
    });
    filter.page = 1
    getList(filter);
    const url = window.location.origin + window.location.pathname + '?' + new URLSearchParams(filter).toString();
    window.history.pushState(filter, '', url);
};

const getList = (params) => {

    const xhr = new XMLHttpRequest();
    const urlParams = new URLSearchParams(params).toString();
    console.log(urlParams)
    xhr.open('GET', '/xhr/posts?' + urlParams, true);
    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            try {
                const res = JSON.parse(xhr.response);
                if (xhr.status === 200) {
                    postListComponent.innerHTML = res.data;
                    bindPaginationAction();
                }
            } catch (error) {
                console.error('Error parsing JSON:', error);
            }
        }
    }
    xhr.send();
}

const bindPaginationAction = () => {
    const prevButton = document.querySelector('.pagination__prev');
    const nextButton = document.querySelector('.pagination__next');

    prevButton.addEventListener('click', (e) => {
        e.preventDefault();
        if (filter.page > 1) {
            filter.page = parseInt(filter.page) - 1;
            getList(filter);
            const url = window.location.origin + window.location.pathname + '?' + new URLSearchParams(filter).toString();
            window.history.pushState(filter, '', url);
        }
    });

    nextButton.addEventListener('click', (e) => {
        e.preventDefault();
        if (filter.page < parseInt(e.target.dataset.lastPage)) {
            filter.page = parseInt(filter.page) + 1;
            getList(filter);
            const url = window.location.origin + window.location.pathname + '?' + new URLSearchParams(filter).toString();
            window.history.pushState(filter, '', url);
        }
    });
}

bindPaginationAction();

