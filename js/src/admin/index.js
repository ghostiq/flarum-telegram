import app from 'flarum/app';
import TelegramSettingsModal from './components/TelegramSettingsModal';

app.initializers.add('flarum-telegram', () => {
    app.extensionSettings['flarum-telegram'] = () => app.modal.show(new TelegramSettingsModal());
});