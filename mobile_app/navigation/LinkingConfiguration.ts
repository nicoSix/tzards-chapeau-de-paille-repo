import * as Linking from 'expo-linking';

export default {
  prefixes: [Linking.makeUrl('/')],
  config: {
    screens: {
      Root: {
        screens: {
          Home: {
            screens: {
              HomeScreen: 'home'
            }
          },
          Sessions: {
            screens: {
              SessionsScreen: 'sessions'
            }
          },
          SessionRecording: {
            screens: {
              SessionRecordingScreen: 'sessionRecording'
            }
          }
        },
      },
      NotFound: '*',
    },
  },
};
