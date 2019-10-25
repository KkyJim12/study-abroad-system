<template>
  <div>
    <vue-dropzone
      ref="myVueDropzone"
      id="dropzone"
      :options="dropzoneOptions"
      @vdropzone-success="vsuccess"
    ></vue-dropzone>
  </div>
</template>

<script>
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";
export default {
  props: ["mytype"],
  name: "app",
  components: {
    vueDropzone: vue2Dropzone
  },
  data: function() {
    return {
      dropzoneOptions: {
        type:'',
        image:'',
        url: "/api/image",
        thumbnailWidth: 150,
        maxFilesize: 0.5,
        maxFiles: 1,
        addRemoveLinks: true,
        headers: { "My-Awesome-Header": "header value" }
      }
    };
  },
  methods: {
    vsuccess: function(file, response) {
      this.type=this.mytype,
      this.image = response.ref;
      axios.post('/api/ref',{
        id:localStorage.getItem('id'),
        type:this.type,
        image:this.image,
      });
    },
  }
};
</script>