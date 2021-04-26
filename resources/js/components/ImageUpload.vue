<template>
  <div>
    <file-pond
      name="image"
      ref="pond"
      label-idle="Drop files here..."
      allow-multiple="false"
      accepted-file-types="image/jpeg, image/png"
      :server="{
        process: {
          url: '/admin/images/upload',
          headers: { 'X-CSRF-TOKEN': csrfToken },
        },
        revert: {
          url: '/admin/images/revert',
          method: 'POST',
          headers: { 'X-CSRF-TOKEN': csrfToken },
        },
      }"
      v-bind:files="image"
    />
  </div>
</template>

<script>
import vueFilePond from "vue-filepond";

// Import image preview and file type validation plugins
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.esm.js";

const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview
);

export default {
  data: function () {
    return {
      image: "",
      csrfToken: document.querySelector('meta[name="csrf-token"]').content,
    };
  },
  methods: {
    handleFilePondInit: function () {
      console.log("FilePond has initialized");
      // FilePond instance methods are available on `this.$refs.pond`
      // this.$refs.pond.getFiles();
    },
    // handleProcessFile: function (error, file) {
    //   console.log("done", file.serverId);
    //   document.querySelector("#link").value = file.serverId;
    // },
  },
  components: {
    FilePond,
  },
};
</script>

<style>
@import "~filepond/dist/filepond.min.css";
@import "~filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
</style>