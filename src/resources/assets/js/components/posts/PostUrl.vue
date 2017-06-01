<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                            <div class="padding-css">
                                <div class="col-xs-2 col-sm-1 image-thumb">
                                    <div class="row flex-center">
                                        <img :src="thumbnail" class="">
                                    </div>
                                </div>
                                <div class="user-post-details col-xs-5">
                                    <span ><b v-if="post.user" v-text="post.user.firstname "></b></span>
                                    <span class="small" v-text="at"> </span>
                                </div>
                                <div class="col-xs-3 col-xs-offset-2">
                                        <!-- <span class="pull-right">
                                        </span> -->
                                </div>  
                                <div class="clearfix"></div>
                            </div>
                            <div class="padding-css border-top">
                                    <p class="text-post-share" v-text="post.body">
                                        
                                    </p>

                                    
                                    <div  class="post-image padding-10 img-thumbnail" 
                                    v-if="post.image"    
                                    :style="{ 'background-image': 'url(' + postImage + ')' }">
                                    </div>
                                    
                            </div>

                            <div class="padding-10 border-top">
                                <div class="padding-10 col-md-6 likeshare">
                                    <span v-if="post.likedByCurrentUser">
                                        <i class="fa fa-heart"></i> <span v-text="likeCounter"></span>  <a href="#" @click.prevent="unlike"> unlike</a>
                                        
                                    </span>
                                    <span v-else>
                                        <i class="fa fa-heart"></i> <span v-text="likeCounter"></span>   <a href="#" @click.prevent="like">like</a>
                                    </span>
                                    <span><i class="fa fa-commenting-o"></i> <span v-text="commentCount"></span>  {{ pluralizeComments }} </span>
                                </div>
                                <div class="col-sm-12 gray-background padding-css">
                                    <b><span v-text="commentCount"></span> {{ pluralizeComments }}  </b>
                                    <comments :comments="comments" :post-id="post.id"></comments>    
                                </div>
                            </div>
            </div><!-- End Of Post Column -->
        </div> <!-- End Of body -->
    </div> <!-- End Of panel -->
</template>
<script>
    import moment from "moment";
    import pluralize from "pluralize";
    import eventHub from "../../event";
    export default {
        data(){
            return {
                comments: [],
                likeCounter: null
            }        
        },
        
        props: ['post'],

        mounted(){
            this.comments = this.post.comments;
            
            if(this.post.likes_counter){
                    this.likeCounter = this.post.likes_counter.count
            }else{
                    this.likeCounter = 0;
            }
        },
        computed: {
            commentCount(){
                return this.comments.length;
            },
            thumbnail(){
                if(this.post.user){
                    return window.storageUrl + '/avatar/' + 'tn-' + this.post.user.avatar;
                }
                return '';
            },
            at(){
                return moment.utc(this.post.created_at).fromNow();
            } ,
            postImage(){
                if(this.post.user){
                    return window.storageUrl + '/' + this.post.image;
                }
                return '';
            },

            pluralizeComments(){
                return pluralize('Comment', this.commentCount );
            }
        },
        methods: {
            getComments(){
                axios.get('/posts/'+ this.post.id + '/comments').then( res => {
                    this.comments = res.data;
                } );
            },
            like(){
                this.post.likedByCurrentUser = true;
                this.likeCounter += 1; 
                axios.get('/posts/'+ this.post.id + '/like').then( res => {
                }).catch(function (error) {
                    console.log(error);
                    this.post.likedByCurrentUser = false;
                    this.post.likes_counter.count -= 1;
                });
            },
            unlike(){
                this.post.likedByCurrentUser = false;
                this.likeCounter -= 1;
                axios.get('/posts/'+ this.post.id + '/unlike').then( res => {
                })
                .catch(function (error) {
                    console.log(error);
                    this.post.likedByCurrentUser = true;
                    this.post.likes_counter.count += 1;
            });
            }
        }
    }
</script>