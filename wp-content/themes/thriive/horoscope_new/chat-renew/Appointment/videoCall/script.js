'use strict';

const KnowlarityMeetExternalAPI = (() => Object.freeze({

  createMeeting: async function (domain, options) {

    const importKnowlarityMeetExternalApi = (domain) => {

      if (!domain) {
        throw new Error('domain is empty')
      }

      return new Promise(async (resolve) => {
        if (window.JitsiMeetExternalAPI) {
          resolve(window.JitsiMeetExternalAPI);
        } else {
          const head = document.getElementsByTagName('head')[0];
          const script = document.createElement('script');

          script.setAttribute('type', 'text/javascript');
          script.setAttribute("src", `https://${domain}/external_api.js`);
          script.setAttribute('id', 'knowlarity-meet-external-api');

          script.addEventListener('load', (event) => {
            resolve(window.JitsiMeetExternalAPI);
          }, true);

          head.appendChild(script);
        }
      });
    }

    try {

      let api = await importKnowlarityMeetExternalApi(domain)

      if (api) {
        window.KnowlarityMeetAPI = new api(domain, options);

        console.log('KnowlarityMeetAPI::', KnowlarityMeetAPI);
        console.log('typeof of KnowlarityMeetAPI::', typeof KnowlarityMeetAPI);
      } else {
        window.KnowlarityMeetAPI = undefined;
      }

    } catch (e) {
      console.error('Error:: ', e);
      return null;
    }

  }
}))();

