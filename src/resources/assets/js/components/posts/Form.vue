<template>
	<div class="wall-con col-md-12" >
		<form id="post-form" action="/posts" method="post" class="form-horizontal" enctype="multipart/form-data" @submit.prevent="post">
            <input type="hidden">
			<div class="col-md-10">
				<div class="form-group ">
			        <textarea v-model="form.body" name="body" cols="30" rows="6" id="body" class=" text-post" :placeholder="this.$lang.messages.whats_on_mind"></textarea>
				</div>
			</div>
			<div class="col-md-2">
				<button class="btn-send" v-text="this.$lang.messages.post"></button>
			</div>
			<div class="col-md-12">
				<label id="photo-label" for="photo">
                    <i class="fa fa-camera"></i> 
                    <span class="label-text" v-text="uploadOrChange"></span>
                </label>
				<input id="photo" @change="processFile($event)" class="display-none" name="image" type="file" accept="image/*">
			</div>
            <div id="preview" v-if="form.image" class="col-md-12 hide">
                <img id="file-img"  alt="Image preview" class="thumbnail" :style="{
                    'max-width' : this.options.maxWidth,
                    'max-height' : this.options.maxHeight
                }">
            </div>
		</form>
	</div>
</template>

<script>
	import Form from "../../form/Form"
    import eventHub from "../../event";
    export default {
        data(){
            return {
                form: new Form({
                    body: "",
                    image: ""
                }),
                options: {
                    maxWidth: 250,
                    maxHeight: 250,
                }
            }
        },
        computed: {
            uploadOrChange(){
                if(this.form.image){
                    return this.$lang.messages.change_photo;
                }
                    return this.$lang.messages.upload_photo;
                }
        },
        methods: {
        	post(){
               let form = $('#post-form')[0]
               var data = new FormData(form);
               console.log(data)
                axios.post('/posts', data, {
                    headers: { 'Content-Type': `multipart/form-data; boundary=${data._boundary}` }
                }).then(res => {
                    eventHub.$emit('posted', res.data);
                    console.log(res);
                    $('#preview').addClass('hide');
                    this.form.reset();
                })
                
            },

            processFile(event){
                this.form.image = event.target.files[0]
                console.log(event.target.files.length);
                // if(event.target.files.length > 0){
                //     $('.label-text').html('Change Photo')
                // }else{
                //     $('.label-text').html('Upload Photo')
                // }
                $('#preview').html(this.getImageThumbnailHtml(this.form.image));
                let fileReader = new FileReader();
                fileReader.onload = function (event) {
                    let result = event.target.result
                    document.getElementById('file-img').src = result;
                    $('#preview').removeClass('hide');
                }
                fileReader.readAsDataURL(this.form.image);

            },
            getImageThumbnailHtml(src) {
                return '<img id="file-img" src="' + src + '" alt="Image preview" class="thumbnail" style="max-width: ' + this.options.maxWidth + 'px; max-height: ' + this.options.maxHeight + 'px">';
            }
        }
    }
</script>
