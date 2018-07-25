// document.getElementsByClassName("projectList").addEventListener("click", viewProject(e));

// function viewProject (e){
//     console.log(e.target.value);
//     const urlPHP = "/";
//     var data = new FormData();
//     data.append("choixProjet", e.target.value);
            
//     var paramAjax = {
//         method : "POST",
//         body : data
//     };

//     fetch(urlPHP, paramAjax).then(function(response){
//         return response.json();
//     }).then (function (response){
//         console.log(response);
        
//     })
// }

<template>
    <nav>
        <ul>
            <li v-for="menuElem in menuElements" v-bind:key="menuElem.name">
                <router-link :to="menuElem.url">{{menuElem.name}}</router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
  name : 'Menu',
  data () {
    return {
        menuElements : [
            {
                url: '/',
                name: 'Home'
            },
            {
                url: '/experiences',
                name: 'Experiences'
            },
            {
                url: '/projets',
                name: 'Projets'
            },
        ]
    }
  }
}
</script>

<style lang="scss" scoped>
    ul {
        display: flex;
        justify-content: space-between;
        list-style-type: none;
        max-width:1300px;
        margin: 0 auto;
    }
    @media screen and (max-width: 640px) {
        ul {
            display: block;
        }
    }
</style>