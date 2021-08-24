<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue.js $ PHP PDO</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>

<body>

    <div class="container" id="app">
        <h2 align="center"> {{message}}</h2>
        <div class="row">
            <div class="col-md-12">
                <form method="post" @reset="resetData" @submit="submitData">


                    <div class="mb-3">
                        <label for="" class="form-label">ชื่อจริง</label>
                        <input type="text" class="form-control" id="" v-model="form.fname">

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="" v-model="form.lname">
                    </div>

                    <button type="submit" class="btn btn-primary">{{form.status}}</button>
                    <button type="reset" class="btn btn-danger">ยกเลิก</button>



                </form>
            </div>
        </div>
        <div class="py-2">
            {{form}}
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">นามสกุล</th>
                    <th scope="col">แก้ไข</th>
                    <th scope="col">ลบ</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="row in users">
                    <th scope="row">{{row.id}}</th>
                    <td>{{row.fname}}</td>
                    <td>{{row.lname}}</td>
                    <td> <button @click="editUser(row.id)" class="btn btn-warning">แก้ไข</button></td>
                    <td> <button @click="deleteUser(row.id)" class="btn btn-danger">ลบ</button></td>
                </tr>

            </tbody>
        </table>
    </div>

    <script src="vue.js"></script>
</body>

</html>