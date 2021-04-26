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
      :files="[
        {
          source: this.source,
          options: {
            type: 'local',
            metadata: { poster: this.source },
          },
        },
      ]"
    />
  </div>
</template>

<script>
import vueFilePond from "vue-filepond";

// Import image preview and file type validation plugins
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginFilePoster from "filepond-plugin-file-poster";
import FilePondPluginImagePreview from "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.esm.js";

const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview,
  FilePondPluginFilePoster
);

export default {
  probs: {
    file: "",
  },
  data: function () {
    return {
      image: this.$attrs.file.link,
      csrfToken: document.querySelector('meta[name="csrf-token"]').content,
      source: this.$attrs.file.link,
    };
  },
  components: {
    FilePond,
  },
};
</script>

<style>
@import "~filepond/dist/filepond.min.css";
@import "~filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
@import "~filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css";
</style>