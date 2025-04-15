function showFilter(id, state) {

    let filter = document.querySelector(".filter_" + id) 

    if(!filter.classList.contains(state)) {
        filter.classList.add(state) ;
    } else {
        filter.classList.remove(state) ;
    }

}