<!DOCTYPE html>
<html lang="en">

<head>
    <!-- import common header and common scripts, using correct relative path -->
    <?php include "../../components/common/header.php"; ?>
    <?php include "../../components/common/scripts.php" ?>
    <!-- TODO: Check the scripts.php shown above to see all the helper functions written inside -->

    <!-- TODO: Add any relevant scripts -->

    <title><!-- TODO: change name --></title>
    <script>
        // Choose whether protected or unprotected
        checkUnprotectedRoutes(); /* or */ checkProtectedRoutes();

        // TODO: Add neccessary preload-needed scripts, otherwise add it at the bottom of the <body>
    </script>
</head>

<body>
    
    <script>
        /**
         * 
         * Note! We use jQuery to perform same things we can do using Javascript, but with shorter code
         * 
         * To do POST request to backend: 
            $("#{{{formID}}}").submit(function(e) {
                e.preventDefault(); // prevent page to reload after submit

                // get input from form
                const input = $('#input').val()

                // axios post request
                axios.post('{{{the route in backend}}}}', {
                        form data as body
                    })
                    .then(
                        //  what to do after getting response from server
                        function(response) {
                            console.log(response);

                        }).catch(function(error) {
                        // catch error and show it to user
                        console.log(error);
                    });
        });
         * 
         * To do GET request from backend:
         * axios.get('{{{the route in backend}}}}')
                    .then(
                        //  what to do after getting response from server
                        function(response) {
                            console.log(response);

                        }).catch(function(error) {
                        // catch error and show it to user
                        console.log(error);
                    });
         * 
         */
        
    </script>
</body>

</html>