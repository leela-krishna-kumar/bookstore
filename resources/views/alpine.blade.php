<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Bootstrap 5 Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.0/axios.min.js" integrity="sha512-WrdC3CE9vf1nBf58JHepuWT4x24uTacky9fuzw2g/3L9JkihgwZ6Cfv+JGTtNyosOhEmttMtEZ6H3qJWfI7gIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            [x-cloak]{
                display: none;
            }
        </style>
    </head>

    <body>

        <div class="container-fluid p-5 bg-primary text-white text-center">
            <h1>My First Bootstrap Page</h1>
            <p>Resize this responsive page to see the effect!</p>
        </div>




        <div class="container mt-5" x-data="{open:false, name: 'Brad', search: '123',
            posts: [{title : 'post 1'}, {title : 'post 2'}, {title : 'post 3'}, {title : 'post 4'}]
            }">



            <div x-bind:style="$store.darkMode.on && {color: 'white', backgroundColor:'black'}">

             <p>  lorem epsdfsf sfsfsfg </p>

                <button class="btn btn-primary" x-on:click="$store.darkMode.toggle()" >Toggle</button>
            </div>


            <script>
                document.addEventListener('alpine:init', () =>{
                    Alpine.store('darkMode', {
                        on: false,

                        toggle() {
                            this.on = !this.on;
                        },
                    })
                })
            </script>


            <button class="btn btn-danger" x-on:click="$el.innerHTML = 'Hello'">Replace text</button>

            <div @notify="alert('you are notified!')">
                <button class="btn btn-success" x-on:click="$dispatch('notify')">Notify</button>
            </div>


            <button x-on:click="getNewPost($data.posts)" class="btn btn-danger" >new post</button>

            <script>
                function getNewPost(posts){
                console.log(posts.slice(-1).pop());
                }
            </script>

            <div x-init="$watch('posts', value => console.log(value))"></div>

            <input type="text" x-model="search"  />

            <span>Searching for <span x-text="search"></span> </span>

            <div>
               <p> My name is <span x-text="name"></span></p>
            </div>

            <template x-if="open">
                <p>Hello <span x-text="name"></span></p>
            </template>

            <template x-for="post in posts">
                <p>Hello <span x-text="post.title"></span></p>
            </template>

            <button x-on:click="posts.push({title : 'New Post'})" :class="open ? 'btn-danger' : 'btn-primary'" class="btn ">Add Post</button>

            <button x-on:click="open=!open" :class="open ? 'btn-danger' : 'btn-primary'" class="btn ">Toggle</button>

            <div x-effect="console.log(open)"></div>

            <div x-ref="text"></div>

            <button x-on:click="$refs.text.innerText = 'Hello World'" class="btn btn-secondary" >Click 1</button>
            <button x-on:click="$refs.text.innerText = 'Hello '" class="btn btn-secondary">Click 2</button>


            <div x-html="(await axios.get('./partial.html')).data">...</div>


            <footer x-data>
                <p>Copyright &copy; <span x-text="new Date().getFullYear()"></span></p>
            </footer>




            <div class="row" x-show="open" x-transition x-cloak>
                <div class="col-sm-4">
                    <h3>Column 1</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-4">
                    <h3>Column 2</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-4">
                    <h3>Column 3</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
            </div>
        </div>

    </body>

</html>
