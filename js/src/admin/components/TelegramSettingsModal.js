import SettingsModal from 'flarum/components/SettingsModal';
import Switch from 'flarum/components/Switch';

const settingsPrefix = 'ghostiq-flarumtelegram.';
const translationPrefix = 'ghostiq-flarumtelegram.admin.settings.';

export default class TelegramSettingsModal extends SettingsModal {
    className() {
      return 'TelegramSettingsModal Modal--small';
    }

    title() {
        return app.translator.trans(translationPrefix + 'title');
    }

    /*form() {
        return [
            m('.Form-group', [
                m('label', app.translator.trans(translationPrefix + 'field.botUsername')),
                m('input.FormControl', {
                    bidi: this.setting(),
                    placeholder: 'SampleBot',
                }),
            ]),
            m('.Form-group', [
                m('label', app.translator.trans(translationPrefix + 'field.botToken')),
                m('input.FormControl', {
                    bidi: this.setting(settingsPrefix + 'botToken'),
                    placeholder: '123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11',
                }),
            ]),
            m('.Form-group', [
                m('label', Switch.component({
                    state: [true, '1'].indexOf(this.setting(settingsPrefix + 'enableNotifications')()) !== -1,
                    onchange: this.setting(settingsPrefix + 'enableNotifications'),
                    children: app.translator.trans(translationPrefix + 'field.enableNotifications'),
                })),
            ]),
        ];
    }*/
    
  form() {
    return [
      <div className="Form-group">
        <label>{app.translator.trans(translationPrefix + 'field.botUsername')}</label>
        <input className="FormControl" bidi={this.setting(settingsPrefix + 'botUsername')}/>
      </div>,

      <div className="Form-group">
        <label>{app.translator.trans(translationPrefix + 'field.botToken')}</label>
        <input className="FormControl" bidi={this.setting(settingsPrefix + 'botToken')}/>
      </div>
    ];
  }
}