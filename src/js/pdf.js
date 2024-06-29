import puppeteer from 'puppeteer';

async function saveAsPDF(url, outputPath) {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();
    await page.goto(url, { waitUntil: 'networkidle2' });

    await page.pdf({ path: outputPath, format: 'A4' });
    await browser.close();
}

const url = process.argv[2];
const outputPath = process.argv[3];

saveAsPDF(url, outputPath)
    .then(() => console.log('PDF saved'))
    .catch(err => console.error(err));
