 <h1>Add/Update Customer</h1>
 <br>
  <form action="select.php" method="POST">


            <p><input type="text" readonly name="customerID" value="<?php echo (!empty($_SESSION['customerID']) ?  $row->customerID :  NULL); ?>"></p>


            <p> <label>First Name:</label><input type="text" name="firstName" 
                 value="<?php echo (!empty($_SESSION['customerID']) ?  $row->firstName :  NULL); ?>">
                <span class="error">
                <?php
                 if (!empty($errors['fname'])) {
                  echo $errors['fname'];
                     }
                ?></span>
            </p>


            <p> 
            <label>Last Name:</label> <input type="text" name="lastName" 
            value="<?php echo (!empty($_SESSION['customerID']) ? $row->lastName :NULL); ?>">
                <span class="error">
                  <?php
                    if (!empty($errors['lname'])) {
                        echo $errors['lname'];
                    }
                    ?>
                </span>
            </p>


            <p> <label>Address:</label>  <input type="text" name="address"          value="<?php echo(!empty($_SESSION['customerID']) ? $row->address: NULL);?>">
                <span class="error">   <?php
            if (!empty($errors['address'])) {
                echo $errors['address'];
            }
            ?></span>
            </p>


            <p><label> City: </label><input type="text" name="city" value="<?php echo(!empty($_SESSION['customerID']) ? $row->city : NULL);?>">
                <span class="error"><?php
            if (!empty($errors['city'])) {
                echo $errors['city'];
            }
            ?></span>
            </p>


            <p> <label>State: </label>
                <input type="text" name="state" value="<?php echo (!empty($_SESSION['customerID']) ? $row->state: NULL);?>">
                <span class="error">
                    <?php
                    if (!empty($errors['state'])) {
                        echo $errors['state'];
                    }
                    ?></span>
            </p>


            <p> <label>Postal Code: </label><input type="text" name="postalCode" value="<?php echo (!empty($_SESSION['customerID'])? $row->postalCode : NULL);?>"><span class="error">
        <?php
        if (!empty($errors['postalCode'])) {
            echo $errors['postalCode'];
        }
        ?></span></p>



            <p> <label>Country:</label><select name="countryName" >



                    <?php
                    $sql1 = "SELECT * FROM customers INNER JOIN countries\n"
                            . " ON customers.countryCode = countries.countryCode WHERE customerID ='$id'";

                    $result2 = mysqli_query($connectdb, $sql1);

                    while ($row2 = mysqli_fetch_array($result2)) {
                        echo "<option value='" . $row2['countryCode'] . "'>" . $row2['countryName'] . "</option>";
                    }
                    $sql2 = "SELECT * FROM `countries`";
                    $result3 = mysqli_query($connectdb, $sql2);

                    while ($row3 = mysqli_fetch_array($result3)) {
                        echo "<option value='" . $row3['countryCode'] . "'>" . $row3['countryName'] . "</option>";
                    }
                    ?>
                </select></p>


            <p><label>Phone: </label><input type="text" name="phone" value="<?php echo (!empty($_SESSION['customerID']) ? $row->phone:NULL);?>"><span class="error">
                    <?php
                    if (!empty($errors['phone'])) {
                        echo $errors['phone'];
                    }
                    ?>
                </span>
            </p>


            <p>   <label> Email: </label><input type="text" name="email"
             value="<?php echo (!empty($_SESSION['customerID']) ? $row->email:NULL); ?>"><span class="error">
        <?php
        if (!empty($errors['email'])) {
            echo $errors['email'];
        }
        ?></span>
            </p>


            <p>  <label>Password:</label><input type="password" name="password" value="<?php echo(!empty($_SESSION['customerID']) ? $row->password:NULL);?>">
                <span class="error">
        <?php
        if (!empty($errors['password'])) {
            echo $errors['password'];
        }
        ?></span>
            </p>

            <input type="submit" value="Add Customer" name="submit">


        </form>

<p>
 <blockquote>
 <a href='index.php'>Go Back to Search Results</a>
 </blockquote>
</p>