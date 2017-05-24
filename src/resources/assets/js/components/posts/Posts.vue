<template>
    <div class="row">
        <div class="col-xs-12"> 
            <div class="panel panel-default">
                <div class="panel-body">
                    <post-form></post-form>   
                </div> <!-- End Of body -->
            </div> <!-- End Of panel -->
            
            <div class="">
                <post v-for="post of posts" :post="post" :key="post.id"></post>    
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
                }
            }        
        },
        props: ['url'],
        mounted() {
            this.getPosts();
            eventHub.$on('posted', this.addNewPost);
        },

        methods: {
            getPosts(){
                let uri;
                if(this.url){
                    uri = this.url; 
                }else{
                    uri = 'api/posts';
                }
                axios.get(uri).then( res => {
                    this.posts = res.data.data;
                    
                    this.paginator.total= res.data.total;
                    this.paginator.current_page= res.data.current_page;
                    this.paginator.last_page= res.data.last_page;
                    this.paginator.next_page_url= res.data.next_page_url;
                    this.paginator.prev_page_url= res.data.prev_page_url;
                } );
            },

            loadMore(){
                axios.get(this.paginator.next_page_url).then( res => {
                    this.posts.push(res.data.data); 
                    
                    this.paginator.total= res.data.total;
                    this.paginator.current_page= res.data.current_page;
                    this.paginator.last_page= res.data.last_page;
                    this.paginator.next_page_url= res.data.next_page_url;
                    this.paginator.prev_page_url= res.data.prev_page_url;
                })
            },

            addNewPost(post){
                this.posts.unshift(post);
            }
        }
    }
</script>
