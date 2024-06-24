const db = require("../db.js");
const path = require('path');
const fs = require('fs');
const multer = require('multer');

// Directory paths for uploads
const uploadDir = path.join(__dirname, '../public/uploads');

// Create directories if they don't exist
if (!fs.existsSync(uploadDir)) {
    fs.mkdirSync(uploadDir, { recursive: true });
}

const storage = multer.diskStorage({
    destination: function (req, file, cb) {
        cb(null, uploadDir);
    },
    filename: function (req, file, cb) {
        if (file.originalname.startsWith(req.params.solutionID)) {
            const filePath = path.join(uploadDir, file.originalname);
            fs.unlinkSync(filePath);
            cb(null, file.originalname);
        } else {
            cb(null, req.params.solutionID + path.extname(file.originalname));
        }
    }
});

// const storage = multer.diskStorage({
//     destination: function (req, file, cb) {
//         cb(null, uploadDir);
//     },
//     filename: function (req, file, cb) {
//         const extension = path.extname(file.originalname);
//         const solutionID = req.params.solutionID;
//         const number = req.params.number; // Assume the number is passed as a parameter
        
//         const newFileName = `${solutionID}_${number}${extension}`;

//         // Check if the file exists and delete if it does
//         const filePath = path.join(uploadDir, newFileName);
//         if (fs.existsSync(filePath)) {
//             fs.unlinkSync(filePath);
//         }

//         cb(null, newFileName);
//     }
// });


const upload = multer({ storage: storage });;

exports.uploadFile = upload.single('fileUpload');

exports.handleUpload = (req, res) => {
    try {
        const solutionParam = req.params;
        // Ensure filename ends with .jpg
        console.log(path.extname(req.file.filename))
        const newFilename = path.basename(req.file.filename, path.extname(req.file.filename)) + '.jpg';
        const file_path = path.join('/public/uploads/', newFilename);

        const qInsert = "INSERT INTO `anssolution`(`solutionID`, `timestamp`, `questionID`, `ans`, `Round`) VALUES (?,'2024-06-30 00:00:00.001','3',?,?)";
        const qFetchData = "SELECT * FROM anssolution WHERE solutionID = ? AND round=? AND questionID='3'";
        const qUpdate = "UPDATE anssolution SET ans=? WHERE solutionID=? AND round=? AND questionID='3';";

        db.query(qFetchData, [solutionParam.solutionID, req.body.round], (err, fetchData) => {
            if (err) return res.status(500).json({ error: "FetchDataError", message: err });

            if (fetchData && fetchData.length > 0) {
                db.query(qUpdate, [file_path, solutionParam.solutionID, req.body.round], (err, updateData) => {
                    if (err) return res.status(500).json({ error: "UpdateError", message: err });
                    res.status(200).json({ message: 'File uploaded successfully' });
                });
            } else {
                db.query(qInsert, [solutionParam.solutionID, file_path, req.body.round], (err, insertData) => {
                    if (err) return res.status(500).json({ error: "InsertDataError", message: err });
                    res.status(200).json({ message: 'File uploaded successfully' });
                });
            }
        });
    } catch (err) {
        console.log(err);
        res.status(500).json({ error: "CatchError", message: err });
    }
};

