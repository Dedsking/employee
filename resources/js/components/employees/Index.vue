<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employees</h1>
        </div>

        <div class="row">
            <div class="card mx-auto">
                <div v-if="showMessage">
                    <div class="alert alert-success">{{ message }}</div>

                    <!-- <div class="alert alert-danger"></div> -->
                </div>
                <div class="class-header">
                    <div class="row">
                        <div class="col">
                            <form class="form-inline p-2">
                                <input
                                    v-model.lazy="search"
                                    class="form-control mr-sm-2 form-control-sm"
                                    name="search"
                                    type="search"
                                    placeholder="Search"
                                    aria-label="Search"
                                />

                                <button
                                    class="btn btn-success my-2 my-sm-0 btn-sm"
                                    type="submit"
                                >
                                    Search
                                </button>
                            </form>
                        </div>

                        <div class="col-sm-4 mt-2">
                            <select
                                v-model="selectedDepartment"
                                name="department"
                                class="form-control mr-sm-2 form-control-sm"
                                aria-label="Default select example"
                            >
                                <option
                                    v-for="department in departments"
                                    :key="department.id"
                                    :value="department.id"
                                >
                                    {{ department.name }}
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <router-link
                                :to="{ name: 'EmployeesCreate' }"
                                class="btn btn-primary btn-sm m-2"
                                >Create</router-link
                            >
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Department</th>
                                <th scope="col">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(employee, index) in employees"
                                :key="employee.id"
                            >
                                <th scope="row">{{ index + 1 }}</th>
                                <td>{{ employee.id }}</td>
                                <td>{{ employee.first_name }}</td>
                                <td>{{ employee.last_name }}</td>
                                <td>{{ employee.address }}</td>
                                <td>{{ employee.department.name }}</td>
                                <td>
                                    <router-link
                                        :to="{
                                            name: 'EmployeesEdit',
                                            params: { id: employee.id },
                                        }"
                                        class="btn btn-warning btn-sm"
                                        >Edit</router-link
                                    >
                                    <button
                                        class="btn btn-danger btn-sm"
                                        @click="deleteEmployee(employee.id)"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            employees: [],
            showMessage: false,
            message: "",
            search: null,
            selectedDepartment: null,
            departments: [],
        };
    },
    watch: {
        search() {
            this.getEmployees();
        },
        selectedDepartment() {
            this.getEmployees();
        },
    },
    created() {
        this.getEmployees();
        this.getDepartments();
    },
    methods: {
        // getSearch() {
        //     axios
        //         .get("/api/employees", {
        //             params: {
        //                 search: this.search,
        //                 department_id: this.selectedDepartment,
        //             },
        //         })
        //         .then((response) => {
        //             this.employees = response.data.data;
        //         })
        //         .catch((error) => {
        //             console.log(console.error);
        //         });
        // },
        getEmployees() {
            axios
                .get("/api/employees", {
                    params: {
                        search: this.search,
                        department_id: this.selectedDepartment,
                    },
                })
                .then((response) => {
                    this.employees = response.data.data;
                })
                .catch((error) => {
                    console.log(console.error);
                });
        },
        getDepartments() {
            axios
                .get("/api/employees/departments")
                .then((response) => {
                    this.departments = response.data;
                })
                .catch((error) => {
                    console.log(console.error);
                });
        },
        deleteEmployee(id) {
            axios.delete("/api/employees/" + id).then((response) => {
                this.showMessage = true;
                this.message = response.data;
                this.getEmployees();
            });
        },
    },
};
</script>

<style></style>
