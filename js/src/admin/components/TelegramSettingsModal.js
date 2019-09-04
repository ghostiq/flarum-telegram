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