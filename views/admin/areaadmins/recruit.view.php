<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $heading ?? 'Recruit Member' ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f7f9;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            position: relative;
            background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(245, 247, 249, 0.85);
            z-index: 1;
        }

        .container {
            padding: 30px;
            width: 100%;
            max-width: 800px;
            background-color: #f5f7f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            position: relative;
            z-index: 2;
            flex-grow: 1;
        }

        .logo-container {
            align-self: flex-start;
            margin-bottom: 20px;
            padding-left: 10px;
            font-family: 'Poppins', sans-serif;
        }

        .logo {
            width: 100px;
            height: auto;
        }

        h1 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
            padding-bottom: 15px;
            border-bottom: 3px solid #5EBC67;
            width: 100%;
            max-width: 800px;
        }

        .form-container {
            width: 100%;
            max-width: 800px;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
        }

        .form-section {
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eaeef2;
        }

        .form-section:last-child {
            border-bottom: none;
        }

        .section-title {
            font-size: 16px;
            font-weight: 600;
            color: #5EBC67;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-row {
            margin-bottom: 16px;
        }

        .form-row:last-child {
            margin-bottom: 0;
        }

        .form-row-flex {
            display: flex;
            gap: 20px;
            margin-bottom: 16px;
        }

        .form-col {
            flex: 1;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #444;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #dfe3e9;
            border-radius: 6px;
            font-size: 14px;
            color: #333;
            background-color: #fff;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #5EBC67;
            box-shadow: 0 0 0 3px rgba(94, 188, 103, 0.15);
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;utf8,<svg fill='%23333' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 18px 18px;
            padding-right: 40px;
            cursor: pointer;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .checkbox-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 10px;
            margin-top: 5px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
        }

        .checkbox-item input[type="checkbox"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border: 1px solid #dfe3e9;
            border-radius: 4px;
            outline: none;
            transition: all 0.2s ease;
            position: relative;
            cursor: pointer;
            flex-shrink: 0;
            margin-right: 6px;
        }

        .checkbox-item input[type="checkbox"]:checked {
            background-color: #5EBC67;
            border-color: #5EBC67;
        }

        .checkbox-item input[type="checkbox"]:checked::after {
            content: '';
            position: absolute;
            left: 6px;
            top: 2px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .checkbox-item input[type="checkbox"]:focus {
            border-color: #5EBC67;
            box-shadow: 0 0 0 3px rgba(94, 188, 103, 0.15);
        }

        .checkbox-item label {
            font-size: 13px;
            margin-bottom: 0;
            cursor: pointer;
            color: #444;
            font-weight: normal;
        }

        .file-upload-container {
            padding: 18px 20px;
            background-color: #f8fbf8;
            border: 1px solid #e0e9e2;
            border-radius: 8px;
        }

        .file-upload-title {
            font-weight: 600;
            color: #444;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .file-upload-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 15px;
            border: 2px dashed #dfe3e9;
            border-radius: 6px;
            background-color: #fafbfc;
            transition: border-color 0.2s ease, background-color 0.2s ease;
        }

        .file-upload-area:hover {
            border-color: #5EBC67;
            background-color: #f9fcf9;
        }

        input[type="file"] {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        input[type="file"] + label {
            display: inline-block;
            cursor: pointer;
            background-color: #5EBC67;
            color: white;
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 4px;
            transition: background-color 0.2s ease;
            margin-bottom: 8px;
            font-weight: 500;
            text-align: center;
        }

        input[type="file"] + label:hover {
            background-color: #4fa858;
        }

        .file-info {
            font-size: 13px;
            color: #666;
            margin-top: 8px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .submit-btn {
            background-color: #5EBC67;
            color: white;
            padding: 12px 24px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s ease;
            width: 100%;
            max-width: 200px;
            text-align: center;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background-color: #4fa858;
        }

        .cancel-btn {
            background-color: #6c757d;
            color: #fff;
            padding: 12px 24px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s ease;
            width: 100%;
            max-width: 200px;
            text-align: center;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }

        .cancel-btn:hover {
            background-color: #5c636a;
        }

        .footer {
            font-size: 10px;
            font-weight: 300;
            color: #666;
            text-align: center;
            padding: 20px 0;
            font-family: 'Poppins', sans-serif;
            position: relative;
            z-index: 2;
            width: 100%;
        }

        @media (max-width: 1024px) {
            .container {
                padding: 20px;
            }

            .form-container {
                padding: 20px;
            }
        }

        @media (max-width: 768px) {
            .form-row-flex {
                flex-direction: column;
                gap: 16px;
            }

            .form-col {
                width: 100%;
            }

            .checkbox-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .logo-container {
                padding-left: 0;
                display: flex;
                justify-content: center;
            }
        }

        @media (max-width: 600px) {
            .form-container {
                padding: 15px;
            }

            input,
            textarea,
            select {
                font-size: 14px;
                padding: 10px;
            }

            .file-upload-container {
                padding: 15px;
            }

            .submit-btn,
            .cancel-btn {
                padding: 10px 20px;
                font-size: 14px;
                max-width: 180px;
            }
        }

        @media (max-width: 480px) {
            .checkbox-grid {
                grid-template-columns: repeat(1, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="/assets/admins/TravelkLOGO.png" alt="Logo" class="logo">
        </div>
        <h1>Join Us as an Area Administrator</h1>

        <div class="form-container">
            <form action="/recruitments" method="POST" enctype="multipart/form-data">
                <!-- Personal Information Section -->
                <div class="form-section">
                    <div class="section-title">Personal Information</div>

                    <div class="form-row-flex">
                        <div class="form-col">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name" required>
                        </div>
                        <div class="form-col">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <label for="nic">NIC</label>
                        <input type="text" id="nic" name="nic" required>
                    </div>

                    <div class="form-row">
                        <label for="dob">Date of Birth</label>
                        <input type="date" id="dob" name="dob" required>
                    </div>

                    <div class="form-row">
                        <label for="con_num">Contact Number</label>
                        <input type="text" id="con_num" name="con_num" required>
                    </div>

                    <div class="form-row">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>

                <!-- Address and District Section -->
                <div class="form-section">
                    <div class="section-title">Address and District</div>

                    <div class="form-row">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" rows="3" required></textarea>
                    </div>

                    <div class="form-row">
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
                </div>

                <!-- Additional Information Section -->
                <div class="form-section">
                    <div class="section-title">Additional Information</div>

                    <div class="form-row">
                        <label>Languages Spoken</label>
                        <div class="checkbox-grid">
                            <div class="checkbox-item">
                                <input type="checkbox" id="language_eng" name="language_eng" value="1">
                                <label for="language_eng">English</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="language_sin" name="language_sin" value="1">
                                <label for="language_sin">Sinhala</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="language_tam" name="language_tam" value="1">
                                <label for="language_tam">Tamil</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <label for="linkedin">LinkedIn Profile (optional)</label>
                        <input type="text" id="linkedin" name="linkedin">
                    </div>

                    <div class="form-row">
                        <div class="file-upload-container">
                            <div class="file-upload-title">Upload CV</div>
                            <div class="file-upload-area">
                                <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx">
                                <label for="cv">Choose File</label>
                                <p class="file-info">PDF, DOC, or DOCX (Max 1MB)</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="file-upload-container">
                            <div class="file-upload-title">Upload Profile Picture</div>
                            <div class="file-upload-area">
                                <input type="file" id="profile" name="profile" accept="image/*">
                                <label for="profile">Choose File</label>
                                <p class="file-info">JPG, PNG, or GIF (Max 1MB)</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="button-container">
                    <button class="submit-btn" type="submit">Submit Application</button>
                    <a href="/register" class="cancel-btn">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">
        © 2025 traveLK. All rights reserved.
    </div>
</body>
</html>