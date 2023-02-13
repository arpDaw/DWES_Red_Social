const bPerfil = document.querySelector('#bPerfil')

bPerfil.addEventListener('click', event=>
    {
        console.log(bPerfil.dataset.id)
        fetch(`http://redsocial.local/dashboard/perfil`)
    }
)
