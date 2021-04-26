<template>
  <a href="javascript:void(0);" @click="delete_record()" class="text-danger">
    <i class="far fa-trash-alt"></i> Delete
  </a>
</template>

<script>
export default {
  props: ["id", "url"],

  data() {
    return {};
  },

  methods: {
    delete_record() {
      var url = this.url + "/" + this.id;
      Swal.fire({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover it!",
        type: "warning",
        confirmButtonColor: "#e64942",
        confirmButtonText: "Yes",
        showCancelButton: true,
        reverseButtons: true,
      }).then((result) => {
        if (result.value) {
          axios
            .delete(url)
            .then(function () {
              Swal.fire({
                title: "Deleted!",
                text: "The record has been deleted.",
                type: "success",
                timer: 2000,
              }).then(() => {
                location.reload();
              });
            })
            .catch(function (error) {
              Swal.fire({
                title: "Opps...",
                text: error.response.data.message,
                type: "error",
                timer: 5000,
              });
            });
        }
      });
    },
  },
};
</script>