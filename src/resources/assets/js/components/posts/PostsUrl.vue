<template>
    <div class="row">
        <div class="col-xs-12"> 
            
            <div class="">
                <post v-for="post of posts" :post="post" :key="post.id"></post>    
            </div>

            <div v-if="busy" class="text-center padding-bottom-10">
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                <span class="sr-only" v-text="this.$lang.messages.loading"></span>
            </div>
            
        </div><!-- End Of col 12 -->
</div>
</template>

<script>
    import moment from "moment";
    import pluralize from "pluralize";
    import eventHub from "../../event";
    
    export default {
        data(){
            return {
                posts: [],
                paginator: {
                    total: 0,
                    current_page: 0,
                    last_page: 0,
                    next_page_url: null,
                    prev_page_url: null,
                },
                busy: true,
            }        
        },
        props: ['url'],
        mounted() {
            this.getPosts();
            eventHub.$on('posted', this.addNewPost);
            window.onscroll = function () {
                let y = window.pageYOffset + window.innerHeight;
                let app = document.getElementById('app').offsetHeight;
                if(y >= app && !this.busy && this.paginator.next_page_url){
                    this.busy = true;
                    this.loadMore();
                }
            }.bind(this)
        },

        computed: {
        },

        methods: {
            getPosts(){
                
                axios.get(this.url).then( res => {
                    this.posts = res.data.data;
                    
                    this.paginator.total= res.data.total;
                    this.paginator.current_page= res.data.current_page;
                    this.paginator.last_page= res.data.last_page;
                    this.paginator.next_page_url= res.data.next_page_url;
                    this.paginator.prev_page_url= res.data.prev_page_url;
                    
                    /*Set busy to false*/
                    this.busy = false;
                } );
            },

            loadMore(){
                if(this.paginator.next_page_url){
                    this.busy = true;
                    axios.get(this.paginator.next_page_url).then( res => {
                        let posts = res.data.data;
                        _.each(posts, (post) => {
                            this.posts.push(post); 
                        })
                        
                        this.paginator.total= res.data.total;
                        this.paginator.current_page= res.data.current_page;
                        this.paginator.last_page= res.data.last_page;
                        this.paginator.next_page_url= res.data.next_page_url;
                        this.paginator.prev_page_url= res.data.prev_page_url;

                        /*Set busy to false*/
                        this.busy = false;
                    })
                }
            },

            addNewPost(post){
                this.posts.unshift(post);
            }
        }
    }
</script>
