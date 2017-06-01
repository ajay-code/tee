<template>
	<div class="col-sm-10 col-sm-offset-1">
        <form class="form-horizontal" method="post" @submit.prevent="comment">
            <div class="row">
                <div class="col-xs-1">
                    <div class="row">
                        <img :src="avatar" alt="" class="image-responsove">
                    </div>
                </div><!-- End Of col xs 1 -->

                <div class="col-xs-11">
                        <div class="form-group">
                            <input class="form-control" v-model="form.comment" type="text" name="comment" placeholder="Write a comment...">
                        </div>      
                </div><!-- End Of col xs 11 -->
            </div> <!-- End Of row -->
        </form>
    </div><!-- End Of col sm 10 and -->

</template>

<script>
	import Form from "../../form/Form"
    import eventHub from "../../event";
    export default {
        data(){
            return {
                form: new Form({
                    comment: "",
                })
            }
        },
        props: ['postId'],
        computed: {
            avatar(){
                return  window.storageUrl + '/avatar/' + 'tn-' + window.user.avatar
            }
        },
        methods: {
        	comment(){
                this.form.post('/posts/'+ this.postId +'/comments').then(
                    res => {
                        eventHub.$emit('commented-'+ this.postId, res);
                        this.form.reset();
                    }
                )
            } 
        }
    }
</script>
