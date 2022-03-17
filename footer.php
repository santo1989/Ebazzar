<!-- Bootstrap CSS -->
<div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <footer class="bg-dark text-white pt-5 pb-4">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left">

                <div class="col-md-3 col-lg-3 col-x1-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-blod text-warning">Company Name</h5>
                    <p>
                        <a href="index.php" class="text-white" style="text-decoration: none;"> E-Bazzer</a>
                    </p>
                    <p><i class="fas fa-home mr-3"></i>Bangladesh Open University, <br />School of Science and Technology, <br />Department of Computer Science and Engineering, <br />Gazipur, Bangladesh.
                    </p>
                    <p></p>

                </div>
                <div class="col-md-2 col-lg-2 col-x1-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-blod text-warning">Category</h5>
                    <p> <?php
                        $sql = "SELECT * FROM categories";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<p><a href="categories.php?id=' . $row['id'] . '" class="text-white" style="text-decoration: none;">' . $row['name'] . '</a></p>';
                        }
                        ?></p>
                    <!-- <p>
                        <a href="#" class="text-white" style="text-decoration: none;"> Meat</a>
                    </p>

                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;"> Colth</a>
                    </p>

                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;"> Fish</a>
                    </p>

                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">Vegitable</a>
                    </p> -->

                </div>

                <div class="col-md-3 col-lg-3 col-x1-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-blod text-warning">Usefull Link</h5>
                    <p>
                        <a href="member.php" class="text-white" style="text-decoration: none;"> Account</a>
                    </p>

                    <p>

                        <a href="#" class="text-white" style="text-decoration: none;"> Track on Order</a>
                    </p>

                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">Delivery</a>
                    </p>

                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">Return</a>
                    </p>

                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;"> Secure Payment</a>
                    </p>



                </div>

                <div class="col-md-3 col-lg-3 col-x1-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-blod text-warning">Contact</h5>



                    <p>
                        <i class="fas fa-envelope mr-3"></i>Md. Hasibul Islam Santo. <br />ID: 13-0-52-020-003<br /> Email-santo.botany@gmail.com <br />Phone-01714389465
                    </p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i> Sumaiya Muhammad <br />ID- 15-0-52-020-045 <br />Email- sumaiyamuhammad1999@ gmail.com <br />Phone- 01751559747

                    </p>

                </div>
                <hr class="mb-4">
                <div class="row align-item-center">
                    <div class="col-md-7 col-lg-8">
                        <p> copyright @2022 all rigths reserved by;
                            <a href="#" class="text-white" style="text-decoration: none;">
                                <strong class="text-warniing">E-Bazzar</strong>
                            </a>
                        </p>

                    </div>

                    <div class="col-md-5 col-lg-4">
                        <div class="text-center text-md-right">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="btn-floating ntn-sm text-white" style="font-size: 23px;"><i class="fab
                          fa-facebook"></i></a>
                                </li>


                            </ul>
                        </div>
                    </div>

                </div>

    </footer>
</div>