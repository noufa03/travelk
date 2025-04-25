<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $heading ?? 'Recruit Member' ?></title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding-top: 20px;
        }

        .content {
            width: 100%;
            max-width: 900px;
            padding: 40px;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #1e2a38;
        }

        .form-card {
            background-color: #fff;
            border-radius: 12px;
            padding: 40px;
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 6px 20px rgba(0,0,0,0.06);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: white;
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23333" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px 16px;
            padding-right: 40px;
            cursor: pointer;
        }

        .form-group.inline {
            display: flex;
            gap: 20px;
        }

        .form-group.inline > div {
            flex: 1;
        }

        .form-actions {
            text-align: right;
            margin-top: 30px;
        }

        button {
            background-color: #5EBC67;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4aa65b;
        }

        @media (max-width: 768px) {
            .content {
                padding: 20px;
                width: 100%;
            }

            .form-card {
                padding: 20px;
            }

            .form-group.inline {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<div class="content">
    <h1>Join Us as an Area Administrator</h1>

    <div class="form-card">
        <form action="/recruitments" method="POST" enctype="multipart/form-data">
            <div class="form-group inline">
                <div>
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div>
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
            </div>

            <div class="form-group">
                <label for="nic">NIC</label>
                <input type="text" id="nic" name="nic" required>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
            </div>

            <div class="form-group">
                <label for="con_num">Contact Number</label>
                <input type="text" id="con_num" name="con_num" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="district_id">District</label>
                <select id="district_id" name="district_id" required>
                    <option value="" disabled selected>Select a district</option>
                    <?php foreach ($districts as $district): ?>
                        <option value="<?= htmlspecialchars($district['districtid']) ?>">
                            <?= htmlspecialchars($district['district']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Languages Spoken</label>
                <label><input type="checkbox" name="language_eng" value="1"> English</label><br>
                <label><input type="checkbox" name="language_sin" value="1"> Sinhala</label><br>
                <label><input type="checkbox" name="language_tam" value="1"> Tamil</label>
            </div>

            <div class="form-group">
                <label for="linkedin">LinkedIn Profile (optional)</label>
                <input type="text" id="linkedin" name="linkedin">
            </div>

            <div class="form-group">
                <label for="cv">Upload CV</label>
                <input type="file" id="cv" name="cv">
            </div>

            <div class="form-group">
                <label for="profile">Upload Profile Picture</label>
                <input type="file" id="profile" name="profile">
            </div>

            <div class="form-actions">
                <button type="submit">Submit Application</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>