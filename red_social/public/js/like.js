const bLike = document.getElementById('corason')

bLike.addEventListener('click', event => {
        bLike.classList.toggle('like')

        if(bLike.classList.contains('like')) {
            console.log('click')
            fetch(`http://redsocial.local/dashboard/like/${bLike.dataset.id}`)
            console.log(`${bLike.dataset.id}`)
        }else{
            fetch(`http://redsocial.local/dashboard/dislike/${bLike.dataset.id}`)
        }

})





