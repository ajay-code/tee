<template>
	<div class="row">
	    <div class="col-xs-12" style="padding:10px;">
	        	<img :src="thumbnail" alt="" class="image-responsove">
	        	<span class="text-primary"><b v-text="comment.creator.firstname"></b></span> 
	        	<span v-text="comment.body"></span> 
	        	<span class="small" v-text="at"></span>
	    </div>
	</div>
</template>

<script>
	import moment from "moment";
	export default {
        data(){
            return {
            }        
        },
        
        props: ['comment'],

        mounted(){
        },
        computed: {
            thumbnail(){
                if(this.comment.creator){
                    return window.storageUrl + '/avatar/' + 'tn-' + this.comment.creator.avatar;
                }
                return '';
            },
            at(){
                return moment.utc(this.comment.created_at).fromNow();
            }
            
        },
        methods: {
            
        }
    }
</script>