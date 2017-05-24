$.ajax({
                    data: data,
                    type: "POST",
                    url: "/posts",
                    enctype: 'multipart/form-data',
                    processData: false,  
                    contentType: false,
                    cache: false,
                    success: function (data) {
                            eventHub.$emit('posted', res);
                            this.form.reset();
                        },
                        error: function (e) {
                            console.log("ERROR : ", e);
                        }
                })