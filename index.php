<!DOCTYPE html>
<html>

<head>
    <title>Members Directory</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.3/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    // Include the Member.php file
    include('member.php');

    // Create a new Member object and pass the database connection to it
    $member = new Member($db);

    // Fetch the list of all members from the database
    $membersList = $member->getAllMembers();
    ?>
    <h1>Members Directory</h1>
    <div id="members-list">
        <!-- Render the list of all members in UL LI tag format -->
        <ul>
            <?php
            // Function to recursively render the nested members
            function renderMembers($members, $parentId = 0)
            {
                echo "<ul>";
                foreach ($members as $member) {
                    if ($member['ParentId'] == $parentId) {
                        echo "<li>{$member['Name']}</li>";
                        renderMembers($members, $member['Id']);
                    }
                }
                echo "</ul>";
            }

            // Call the recursive function to render the members list
            renderMembers($membersList);
            ?>
        </ul>
    </div>
    <!-- Add Member button -->
    <button id="addMemberBtn" class="btn btn-primary">Add Member</button>

    <!-- Bootstrap modal popup -->
    <div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMemberModalLabel">Add Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addMemberForm">
                        <label for="parentDropdown">Parent:</label>
                        <select name="parentDropdown" id="parentDropdown" class="form-select">
                            <option value="0">None</option>
                            <!-- Dynamic options for Parent dropdown will be added here -->
                        </select>
                        <br>
                        <label for="nameField">Name:</label>
                        <input type="text" name="nameField" id="nameField" class="form-control">
                        <br>
                        <input type="submit" value="Save Changes" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#addMemberBtn").click(function() {
                // Show the Bootstrap modal popup
                $("#addMemberModal").modal('show');
            });

            // Handle form submission using AJAX
            $("#addMemberForm").submit(function(e) {
                e.preventDefault();

                // Get form data
                var formData = $(this).serialize();

                // Send AJAX request to add_member.php
                $.ajax({
                    url: "add_member.php",
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    success: function(data) {
                        // Close the modal
                        $("#addMemberModal").modal('hide');

                        // Append the new member to the list
                        var newMemberItem = $("<li>" + data.Name + "</li>");
                        $("#members-list ul").append(newMemberItem);
                    },
                    error: function(xhr, status, error) {
                        console.log("Error adding member: " + error);
                    }
                });
            });
        });
    </script>

</body>

</html>