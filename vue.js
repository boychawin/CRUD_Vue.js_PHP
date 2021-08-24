var app = new Vue({
  el: "#app",
  data: {
    users: "",
    message: "Vue.js & PHP PDO",
    form: {
      fname: "",
      lname: "",
      isEdit: false,
      status: "บันทึก",
    },
  },
  methods: {
    submitData(e) {
      e.preventDefault();
      check = app.form.fname != "" && app.form.lname != "";
      if (check && !this.form.isEdit) {
        //บันทึก
        axios
          .post("action.php", {
            fname: app.form.fname,
            lname: app.form.lname,
            action: "insert",
          })
          .then(function (res) {
            app.resetData();
            app.getAllUsers();
          });
      }
      if (check && this.form.isEdit) {
        //แก้ไข
        axios
          .post("action.php", {
            id: app.form.id,
            fname: app.form.fname,
            lname: app.form.lname,
            action: "update",
          })
          .then(function (res) {
            app.resetData();
            app.getAllUsers();
          });
      }
    },

    resetData(e) {
      // e.preventDefault();
      app.form.id = "";
      app.form.fname = "";
      app.form.lname = "";
      this.form.status = "บันทึก";
      this.form.isEdit = false;
    },
    getAllUsers() {
      axios
        .post("action.php", {
          action: "getAll",
        })
        .then(function (res) {
          // app.resetData();
          // console.log(res);
          app.users = res.data;
        });
    },
    editUser(id) {
      axios
        .post("action.php", {
          action: "getEdit",
          id: id,
        })
        .then(function (res) {
          app.form.id = res.data.id;
          app.form.fname = res.data.fname;
          app.form.lname = res.data.lname;
        });

      this.form.status = "อัพเดท";
      this.form.isEdit = true;
    },
    deleteUser(id) {
      if (confirm("ต้องการลบรหัส " + id + " หรือไม่?")) {
        axios
          .post("action.php", {
            action: "dalete",
            id: id,
          })
          .then(function (res) {
            app.resetData();
            app.getAllUsers();
          });
      }
    },
  },
  created() {
    this.getAllUsers();
  },
});
