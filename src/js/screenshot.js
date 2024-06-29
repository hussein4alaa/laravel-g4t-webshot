import puppeteer from 'puppeteer';

async function takeScreenshot(url, outputPath, extension, width, height) {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();

    // Set viewport size based on parameters
    await page.setViewport({ width: parseInt(width), height: parseInt(height) });

    await page.goto(url, { waitUntil: 'networkidle2' });

    if (extension === 'pdf') {
        await page.pdf({ path: outputPath, format: 'A4' });
    } else {
        await page.screenshot({ path: outputPath, fullPage: true });
    }

    await browser.close();
}

const url = process.argv[2];
const outputPath = process.argv[3];
const extension = process.argv[4];
const width = process.argv[5] || 1366;
const height = process.argv[6] || 768;

takeScreenshot(url, outputPath, extension, width, height)
    .then(() => console.log('Screenshot taken'))
    .catch(err => console.error(err));
