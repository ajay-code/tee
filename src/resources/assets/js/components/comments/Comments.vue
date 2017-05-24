<template>
    <div>
        <comment v-for="comment in comments" :comment="comment"></comment >
        <comment-form :post-id="postId"></comment-form>
    </div>
</template>
<script>
    import eventHub from "../../event";
    export default {
        data(){
            return {
            }        
        },
        
        props: ['comments', 'postId'],

        mounted(){
            eventHub.$on('commented-' + this.postId, this.addComment)
        },
        computed: {
            
        },
        methods: {
            addComment(comment){
                this.comments.push(comment);
            }
        }
    }
</script>