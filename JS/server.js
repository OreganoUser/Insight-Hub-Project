/*
$(document).ready(function(){
$.ajax({
    url: 'database.php',
    method: 'GET',
    dataType: 'json',
    success: function(data) {
        console.log(data);
        
        // Initialize the info object to hold the structured data
        const info = {};

            // Process each item in the data array
            for (let i = 0; i < data.length; i += 1) {
                let semester = data[i].semester_name;
                let subject = data[i].subject_name;
                let grade = data[i].grade;

                // Ensure the semester exists in the info object
                if (!info[semester]) {
                    info[semester] = {};
                }

                // Ensure the subject exists under the semester in the info object
                if (!info[semester][subject]) {
                    info[semester][subject] = [];
                }

                // Push the grade into the appropriate subject under the semester
                info[semester][subject].push(grade);
            }

            // Logging the structured info object
            console.log(info);


            // Get the canvas element and its 2D drawing context
            let canvas = document.getElementById('canvas-container');
            let ctx = canvas.getContext('2d');

            function drawUserData() {
                let grade;
                let length = info['Semester 1'].English.length;
                let height = canvas.height;
                let width = canvas.width;
                let x1;
                let y1;
                let x2;
                let y2

                for(let i = 0; i < length; i += 1){
                    grade = info['Semester 1'].English[i];
                    {grade >= 30 ? ctx.fillStyle = 'green': ctx.fillStyle = 'red'};

                    x1 = ((width / length) * i) + 2;
                    y1 = height; 
                    x2 = (width / length) * 0.7;
                    y2 = -((height / 60) * grade);
                    ctx.fillRect(x1, y1, x2, y2);
                    ctx.fillStyle = 'black';
                    ctx.strokeRect(x1, y1, x2, y2);

                    ctx.font = '10px Arial';
                    ctx.fillText(grade + "", x1 + (x2 / 4), y1 - 5);
                }
            }

            drawUserData();
        }
    });
});
*/


$(document).ready(function() {
    // Make AJAX request to fetch data from database.php
    $.ajax({
        url: 'database.php',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // Process data and render subjects with grades
            const info = organizeData(data);
            renderSubjects(info);
        }
    });

    function organizeData(data) {
        const info = {};

        for (let i = 0; i < data.length; i += 1) {
            let semester = data[i].semester_name;
            let subject = data[i].subject_name;
            let grade = data[i].grade;

            if (!info[semester]) {
                info[semester] = {};
            }

            if (!info[semester][subject]) {
                info[semester][subject] = [];
            }

            info[semester][subject].push(grade);
        }

        return info;
    }

    function renderSubjects(info) {
        const subjectList = $('#subject-list');

        for (let semester in info) {
            for (let subject in info[semester]) {
                const subjectId = `${semester}-${subject}`.replace(/\s+/g, '-').toLowerCase();
                const subjectItem = `
                    <li>
                        <div class="subject" id="${subjectId}">
                            <span>${subject}</span>
                            <div class="grade-diagram">
                                <canvas id="canvas-${subjectId}" width="400" height="200"></canvas>
                            </div>
                            <div class="subject-buttons">
                                <div class="grade-buttons">
                                    <button id="add-grade-${subjectId}">Add Grade</button>
                                    <button id="delete-grade-${subjectId}">Delete Grade</button>
                                    <button id="change-grade-${subjectId}">Change Grade</button>
                                </div>
                                <div class="subject-settings">
                                    <button id="delete-subject-${subjectId}">Delete Subject</button>
                                    <button id="change-subject-${subjectId}">Change Subject</button>
                                </div>
                            </div>
                        </div>
                    </li>
                `;
                subjectList.append(subjectItem);

                drawGradesOnCanvas(`canvas-${subjectId}`, info[semester][subject]);
            }
        }
    }

    function drawGradesOnCanvas(canvasId, grades) {
        const canvas = document.getElementById(canvasId);
        const ctx = canvas.getContext('2d');
        const length = grades.length;
        const height = canvas.height;
        const width = canvas.width;
        let x1, y1, x2, y2;

        for (let i = 0; i < length; i += 1) {
            let grade = grades[i];
            ctx.fillStyle = grade >= 30 ? 'green' : 'red';

            x1 = ((width / length) * i) + 2;
            y1 = height;
            x2 = (width / length) * 0.7;
            y2 = -((height / 60) * grade);
            ctx.fillRect(x1, y1, x2, y2);
            ctx.fillStyle = 'black';
            ctx.strokeRect(x1, y1, x2, y2);

            ctx.font = '10px Arial';
            ctx.fillText(grade + "", x1 + (x2 / 4), y1 - 5);
        }
    }

    // Function to open subject modal for adding/deleting subjects
    function openSubjectModal() {
        $('#subjectModal').css('display', 'block');
    }

    // Function to open grade modal for adding/deleting grades
    function openGradeModal() {
        $('#gradeModal').css('display', 'block');
    }

    // Close modal when clicking on close button
    $('.close').click(function() {
        $('#subjectModal').css('display', 'none');
        $('#gradeModal').css('display', 'none');
    });

    // Close modal when clicking outside of it
    $(window).click(function(event) {
        if (event.target == document.getElementById('subjectModal')) {
            $('#subjectModal').css('display', 'none');
        } else if (event.target == document.getElementById('gradeModal')) {
            $('#gradeModal').css('display', 'none');
        }
    });

    // AJAX request to add/delete subjects
    $('#add-subject-semester-1, #add-subject-semester-2, #delete-subject-semester-1, #delete-subject-semester-2').click(function() {
        openSubjectModal();
    });

    $('#subjectForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'addDeleteSubject.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                alert(response);
                $('#subjectModal').css('display', 'none');
                location.reload(); // Reload page to update subject list
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });

    // AJAX request to add/delete grades
    $('#add-grade-semester-1, #add-grade-semester-2, #delete-grade-semester-1, #delete-grade-semester-2').click(function() {
        openGradeModal();
    });

    $('#gradeForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'addDeleteGrade.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                alert(response);
                $('#gradeModal').css('display', 'none');
                location.reload(); // Reload page to update grade diagram
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});

