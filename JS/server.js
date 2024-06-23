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
        console.log(info);
        return info;
    }

    function renderSubjects(info) {
        const subjectListSemester1 = $('#Semester1-subject-list');
        const subjectListSemester2 = $('#Semester2-subject-list');

        for (let semester in info) {
            if (semester === 'Semester 1') {
                for (let subject in info[semester]) {
                    const subjectId = `${semester}-${subject}`.replace(/\s+/g, '-').toLowerCase();
                    const subjectItem = `
                        <li>
                            <div class="subject" id="${subjectId}">
                                <span>${subject}</span>
                                <div class="grade-diagram">
                                    <canvas id="canvas-${subjectId}"></canvas>
                                </div>
                            </div>
                        </li>
                    `;
                    subjectListSemester1.append(subjectItem);

                    drawGradesOnCanvas(`canvas-${subjectId}`, info[semester][subject]);
                }
            } else {
                for (let subject in info[semester]) {
                    const subjectId = `${semester}-${subject}`.replace(/\s+/g, '-').toLowerCase();
                    const subjectItem = `
                        <li>
                            <div class="subject" id="${subjectId}">
                                <span>${subject}</span>
                                <div class="grade-diagram">
                                    <canvas id="canvas-${subjectId}"></canvas>
                                </div>
                            </div>
                        </li>
                    `;
                    subjectListSemester2.append(subjectItem);

                    drawGradesOnCanvas(`canvas-${subjectId}`, info[semester][subject]);
                }
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

            ctx.font = '10px Times New Roman';
            ctx.fillText(grade + "", x1 + (x2 / 4), y1 - 5);
        }
    }

    // Modal logic
    const modal = $('#modal');
    const btn = $('#edit-button');
    const span = $('.close');

    btn.on('click', function() {
        modal.css('display', 'block');
    });

    span.on('click', function() {
        modal.css('display', 'none');
    });

    $(window).on('click', function(event) {
        if ($(event.target).is(modal)) {
            modal.css('display', 'none');
        }
    });

    // Handle form submission in modal
    $('#modal-form').on('submit', function(event) {
        // Prevent the default form submission
        event.preventDefault();
        modal.css('display', 'none');

        // Collect form data
        const semester = $('#semester').val();
        const type = $('#type').val();
        const action = $('#action').val();
        const subject = $('#subject').val();
        const grade = $('#grade').val();

        // AJAX request to handle form submission
        $.ajax({
            url: 'manage.php',
            method: 'POST',
            data: {
                semester: semester,
                type: type,
                action: action,
                subject: subject,
                grade: grade
            },
            success: function(response) {
                location.reload(); // Reload the page to reflect changes
            }
        });
    });
});
