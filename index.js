import cssnano from 'cssnano';

import { readFileSync, writeFileSync } from 'fs';

async function SetMinify () {
    const FilePath = './css/';
    const FileExtension = '.css';
    const FileName = [ FilePath, 'style', FileExtension ].join ('');
    const FileMinified = [ FilePath, 'minify', FileExtension ].join ('');
    try {
        const Result = await cssnano.process (readFileSync (FileName, 'utf8'), {
            from : FileName,
        });
        writeFileSync (FileMinified, Result.css);
    } catch (Error) {
        console.error (Error);
    };
};

SetMinify ();