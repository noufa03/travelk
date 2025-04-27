<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $heading ?? 'Recruit Member' ?></title>
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
        }

        .header {
            width: 100%;
            max-width: 900px;
            padding: 25px 35px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            background-color: #f5f7f9;
            border-bottom: 1px solid #dfe3e9;
        }

        .logo {
            max-height: 60px;
            max-width: 200px;
            width: auto;
            border-radius: 4px;
            border: 1px solid #dfe3e9;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .container {
            padding: 20px 30px;
            width: 100%;
            max-width: 900px;
            background-color: #f5f7f9;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            font-size: 26px;
            font-weight: 600;
            color: #333;
            margin-bottom: 25px;
            text-align: center;
            padding-bottom: 15px;
            border-bottom: 3px solid #007bff;
            width: 100%;
            max-width: 800px;
        }

        .form-container {
            width: 100%;
            max-width: 800px;
            background-color: #fff;
            padding: 30px 35px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
        }

        .form-section {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #e0e9e2;
            border-radius: 8px;
            background-color: #fafbfc;
        }

        .form-section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .form-row {
            margin-bottom: 18px;
        }

        .form-row-flex {
            display: flex;
            gap: 25px;
            margin-bottom: 18px;
        }

        .form-col {
            flex: 1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
            font-size: 15px;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 12px 14px;
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
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.15);
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;utf8,<svg fill='%23333' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
            background-repeat: no-repeat;
            background-position: right 14px center;
            background-size: 18px 18px;
            padding-right: 40px;
            cursor: pointer;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .checkbox-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 12px;
            margin-top: 8px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
        }

        .checkbox-item input[type="checkbox"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border: 1px solid #dfe3e9;
            border-radius: 4px;
            outline: none;
            transition: all 0.2s ease;
            position: relative;
            cursor: pointer;
            flex-shrink: 0;
            margin-right: 8px;
        }

        .checkbox-item input[type="checkbox"]:checked {
            background-color: #007bff;
            border-color: #007bff;
        }

        .checkbox-item input[type="checkbox"]:checked::after {
            content: '';
            position: absolute;
            left: 7px;
            top: 3px;
            width: 6px;
            height: 12px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .checkbox-item input[type="checkbox"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.15);
        }

        .checkbox-item label {
            font-size: 14px;
            margin-bottom: 0;
            cursor: pointer;
            color: #444;
            font-weight: 500;
        }

        .file-upload-container {
            padding: 20px;
            background-color: #f8fbf8;
            border: 1px solid #e0e9e2;
            border-radius: 8px;
            transition: background-color 0.2s ease;
        }

        .file-upload-container:hover {
            background-color: #f9fcf9;
        }

        .file-upload-title {
            font-weight: 600;
            color: #444;
            margin-bottom: 15px;
            font-size: 15px;
        }

        .file-upload-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            border: 2px dashed #dfe3e9;
            border-radius: 6px;
            background-color: #fafbfc;
            transition: border-color 0.2s ease, background-color 0.2s ease;
            position: relative;
        }

        .file-upload-area:hover {
            border-color: #007bff;
            background-color: #f9fcf9;
        }

        .file-upload-area::before {
            content: '\1F4C4';
            font-size: 24px;
            color: #007bff;
            margin-bottom: 10px;
            display: block;
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
            background: linear-gradient(to bottom, #007bff, #0056b3);
            color: white;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 4px;
            transition: background 0.2s ease;
            margin-bottom: 10px;
            font-weight: 600;
            text-align: center;
        }

        input[type="file"] + label:hover {
            background: linear-gradient(to bottom, #0056b3, #004085);
        }

        .file-info {
            font-size: 13px;
            color: #666;
            margin-top: 10px;
            text-align: center;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .submit-btn {
            background: linear-gradient(to bottom, #007bff, #0056b3);
            color: white;
            padding: 14px 30px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: background 0.2s ease;
            width: 100%;
            max-width: 220px;
            text-align: center;
        }

        .submit-btn:hover {
            background: linear-gradient(to bottom, #0056b3, #004085);
        }

        .cancel-btn {
            background: linear-gradient(to bottom, #6c757d, #5c636a);
            color: #fff;
            padding: 14px 30px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: background 0.2s ease;
            width: 100%;
            max-width: 220px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .cancel-btn:hover {
            background: linear-gradient(to bottom, #5c636a, #4b5155);
        }

        @media (max-width: 768px) {
            .header {
                padding: 15px 20px;
            }

            .container {
                padding: 15px 20px;
            }

            .form-container {
                padding: 25px;
            }

            .form-row-flex {
                flex-direction: column;
                gap: 20px;
            }

            .form-col {
                width: 100%;
            }

            .checkbox-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .form-section {
                padding: 15px;
            }
        }

        @media (max-width: 600px) {
            .header {
                padding: 10px 15px;
            }

            .logo {
                max-height: 50px;
                max-width: 150px;
            }

            .form-container {
                padding: 20px;
            }

            input,
            textarea,
            select {
                font-size: 13px;
                padding: 10px 12px;
            }

            .file-upload-container {
                padding: 15px;
            }

            .submit-btn,
            .cancel-btn {
                padding: 12px 25px;
                font-size: 15px;
                max-width: 200px;
            }
        }
    </style>
</head>
<body>

<div class="header">
    <img src="/assets/admins/TravelkLOGO.png" alt="Company Logo" class="logo">
</div>

<div class="container">
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
                            <p class="file-info">PDF, DOC, or DOCX (Max 5MB)</p>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="file-upload-container">
                        <div class="file-upload-title">Upload Profile Picture</div>
                        <div class="file-upload-area">
                            <input type="file" id="profile" name="profile" accept="image/*">
                            <label for="profile">Choose File</label>
                            <p class="file-info">JPG, PNG, or GIF (Max 2MB)</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="button-container">
                <button class="submit-btn" type="submit">Submit Application</button>
                <a href="/admin/dashboard" class="cancel-btn">Cancel</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>